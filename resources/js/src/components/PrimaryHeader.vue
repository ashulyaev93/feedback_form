<template>
	<header class="header">
		<ul class="header__menu nav nav-pills">
			<li class="nav-item">
				<router-link aria-current="page" class="nav-link" to="/">Главная</router-link>
			</li>
			<li class="nav-item">
				<router-link aria-current="page" class="nav-link" to="/feedback">Обратная связь</router-link>
			</li>
		</ul>
	</header>
</template>

<script lang="ts">
	import { defineComponent } from 'vue';

	export default defineComponent({
		components: {},
		setup() {
			return {};
		},
	});
</script>

<style lang="less" scoped>
	.header {
		width: 992px;
		margin: 0 auto;
		height: 100px;
		display: flex;
		align-items: center;
		justify-content: center;

		.nav-link:hover {
			background-color: #007bff;
			color: #fff;
		}
	}
</style>