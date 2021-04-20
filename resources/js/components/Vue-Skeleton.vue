<template>
	<div class="vue-skeleton" :style="getStyle"></div>
</template>

<script>
export default {
    props: ['width', 'height'],

    computed: {
        getStyle() {
            return `width: ${this.width}; height: ${this.height}`
        }
    }
}
</script>

<style>
.vue-skeleton {
	background: #ededed;
	background: linear-gradient(90deg, #ddd, #efefef);
	background-size: 300% 200%;
    border-radius: 3px;
	animation: Animation 1s ease infinite;
	margin-bottom: 11px;
}

@-webkit-keyframes Animation {
	0% {
		background-position: 10% 0%;
	}

	50% {
		background-position: 91% 100%;
	}

	100% {
		background-position: 10% 0%;
	}
}

@-moz-keyframes Animation {
	0% {
		background-position: 10% 0%;
	}

	50% {
		background-position: 91% 100%;
	}

	100% {
		background-position: 10% 0%;
	}
}

@keyframes Animation {
	0% {
		background-position: 10% 0%;
	}

	50% {
		background-position: 91% 100%;
	}

	100% {
		background-position: 10% 0%;
	}
}
</style>