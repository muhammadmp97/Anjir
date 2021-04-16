<template>
	<div class="container">
		<div class="book-box vazir">
			<div class="col-lg-4"></div>

			<div class="col-lg-8">
				<h2 class="mb-0">{{ title }}</h2>
				<div>نویسنده: {{ author }}</div>
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
			description: ""
		};
	},

	methods: {
		loadData() {
			axios.get("/api/book").then(response => {
				this.title = response.data.data.title;
				this.author = response.data.data.author;
				this.description = response.data.data.description;
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
	width: 100%;
	background: #fff;
	height: 200px;
	border-radius: 8px;
	box-shadow: 0 4px 10px rgb(0 0 0 / 10%);
}
</style>