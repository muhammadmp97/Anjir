<template>
	<div class="container">
		<div class="book-box vazir">
			<div class="col-lg-4 text-align-center">
				<img :src="cover_photo" class="cover-photo">
			</div>

			<div class="col-lg-8">
				<h2 class="mb-0 mt-0 bolder">{{ title }}</h2>
				<div class="bold fs-16">نویسنده: {{ author }}</div>
				<p>{{ description }}</p>
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
			cover_photo: ""
		};
	},

	methods: {
		loadData() {
			axios.get("/api/book").then(response => {
				this.title = response.data.data.title;
				this.author = response.data.data.author;
				this.description = response.data.data.description;
				this.cover_photo = response.data.data.cover_photo;
			});
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
}
</style>