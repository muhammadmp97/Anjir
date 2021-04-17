<template>
	<div class="container">
		<div class="book-box vazir">
			<div class="col-lg-4 text-align-center">
				<img :src="cover_photo" class="cover-photo" />
			</div>

			<div class="col-lg-8">
				<h2 class="mb-0 mt-0 bolder">{{ title }}</h2>
				<div class="bold fs-16">نویسنده: {{ author }}</div>
				<p>{{ description }}</p>
			</div>

			<div class="col-lg-12">
				<button class="b-button b-button-red fs-17">{{ price }} تومان</button>
				<button v-if="free_version_url" @click="downloadFreeVersion" class="b-button b-button-gray fs-17">نسخه‌ی نمونه</button>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data: () => {
		return {
			title: "",
			author: "",
			description: "",
			cover_photo: "",
			price: null,
			complete_version_url: "",
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
				this.complete_version_url = data.complete_version_url;
				this.free_version_url = data.free_version_url;
			});
		},

		downloadFreeVersion() {
			window.open(this.free_version_url);
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

	h2 {
		font-size: 28px;
	}

	.cover-photo {
		width: 75%;
		border-radius: 7px;
	}

	.b-button {
		float: left;
		color: #fff;
		font-weight: bold;
		border: none;
		border-radius: 5px;
		padding: 12px 19px 9px;
		margin-left: 10px;
		cursor: pointer;
		transition: .5s;
	}

	.b-button-red {
		background: #fc5147;
		box-shadow: 0 3px 6px rgba(232, 59, 49, .2);

		&:hover {
			background: #ff6057;
			box-shadow: 0 3px 6px rgba(232, 59, 49, .4);
		}

		&:active {
			background: #e04038;
			box-shadow: 0 4px 12px rgba(232, 59, 49, .4);
		}
	}

	.b-button-gray {
		background: #646363;
		box-shadow: 0 3px 6px rgba(87, 87, 87, .2);

		&:hover {
			background: #727272;
			box-shadow: 0 3px 6px rgba(87, 87, 87, .4);
		}

		&:active {
			background: #5c5c5c;
			box-shadow: 0 4px 12px rgba(87, 87, 87, .4);
		}
	}
}
</style>