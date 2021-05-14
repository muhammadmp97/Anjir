<template>
	<div class="container">
		<div class="book-box vazir">
			<div class="book-skeleton-parent" v-if="! loaded">
				<div class="col-lg-4 text-align-center">
					<vue-skeleton width="75%" height="340px" style="margin: 0 auto;"></vue-skeleton>
				</div>

				<div class="col-lg-8">
					<vue-skeleton width="40%" height="40px"></vue-skeleton>
					<vue-skeleton width="100%" height="30px"></vue-skeleton>
				</div>

				<div class="col-lg-12">
					<vue-skeleton width="130px" height="45px" style="float:left;margin-right:15px;" ></vue-skeleton>
					<vue-skeleton width="130px" height="45px" style="float:left;"></vue-skeleton>
				</div>
			</div>

			<div class="book-loaded-content-parent" v-show="loaded">
				<div class="col-lg-4 text-align-center">
					<img :src="cover_photo" class="cover-photo" />
				</div>

				<div class="col-lg-8">
					<h2 class="mb-0 mt-0 bolder">{{ title }}</h2>
					<div class="bold fs-16">نویسنده: {{ author }}</div>
					<p>{{ description }}</p>
				</div>

				<div class="col-lg-12">
					<button @click="showBuyModal" class="b-button b-button-red fs-17 ml-10">{{ getPrice }}</button>
					<button v-if="free_version_url" @click="downloadFreeVersion" class="b-button b-button-gray fs-17 ml-10">نسخه‌ی نمونه</button>
				</div>
			</div>
		</div>

		<modal name="buy-modal" :adaptive="true">
			<div class="buy-modal-inner">
				<center>
					<img src="/images/email-icon.png">
				</center>

				<input type="text" class="email-input" placeholder="لطفا آدرس ایمیل خود را وارد کنید">
				<button class="b-button b-button-red fs-17">تأیید</button>
			</div>
		</modal>
	</div>
</template>

<script>
export default {
	data: () => {
		return {
			loaded: false,
			title: "",
			author: "",
			description: "",
			cover_photo: "",
			price: null,
			free_version_url: null
		};
	},

	methods: {
		loadData() {
			axios.get("/api/book").then(response => {
				let data = response.data.data;
				this.title = data.title;
				this.author = data.author;
				this.description = data.description;
				this.cover_photo = data.cover_photo;
				this.price = data.price;
				this.free_version_url = data.free_version_url;

				this.loaded = true;
			});
		},

		downloadFreeVersion() {
			window.open(this.free_version_url);
		},

		showBuyModal() {
			this.$modal.show('buy-modal')
		}
	},

	computed: {
		getPrice() {
			if (this.price == 0) {
				return "دریافت رایگان";
			}

			return `${this.price} تومان`;
		}
	},

	mounted() {
		this.loadData();
	}
};
</script>

<style lang="scss">
.book-box {
	display: inline-block;
	width: 100%;
	background: #fff;
	border-radius: 7px;
	box-shadow: 0 4px 10px rgb(0 0 0 / 10%);
	padding: 25px 0;
	margin-top: 30px;

	h2 {
		font-size: 28px;
	}

	.cover-photo {
		width: 75%;
		border-radius: 7px;
	}
}

.b-button {
	float: left;
	color: #fff;
	font-family: 'FVazir';
	font-weight: bold;
	border: none;
	border-radius: 5px;
	padding: 12px 19px 9px;
	cursor: pointer;
	transition: 0.5s;
}

.b-button-red {
	background: #fc5147;
	box-shadow: 0 3px 6px rgba(232, 59, 49, 0.2);

	&:hover {
		background: #ff6057;
		box-shadow: 0 3px 6px rgba(232, 59, 49, 0.4);
	}

	&:active {
		background: #e04038;
		box-shadow: 0 4px 12px rgba(232, 59, 49, 0.4);
	}
}

.b-button-gray {
	background: #646363;
	box-shadow: 0 3px 6px rgba(87, 87, 87, 0.2);

	&:hover {
		background: #727272;
		box-shadow: 0 3px 6px rgba(87, 87, 87, 0.4);
	}

	&:active {
		background: #5c5c5c;
		box-shadow: 0 4px 12px rgba(87, 87, 87, 0.4);
	}
}

.buy-modal-inner {
	padding: 10px 25px;

	img {
		width: 225px;
		margin-bottom: 7px;
	}

	input {
		width: 80%;
		font-family: 'FVazir';
		font-size: 15px;
		border: 1px solid #d9d9d9;
		border-radius: 5px;
		text-align: center;
		padding: 8px 10px;
	}

	button {
		width: 18%;
		font-size: 16px !important;
		padding: 10px 0 7px;
		margin-left: 0 !important;
	}
}
</style>