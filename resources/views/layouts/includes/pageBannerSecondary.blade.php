<?php $image = isset($data->data->banner) ? $data->data->banner->image : '' ?>
<div class="page-banner secondary-banner" style="background-image: url('{{ asset('uploads/banners/'.$image) }}')">
	<div>
		<h2>{{ isset($data->data->banner) ? $data->data->banner->title_01 : trans('texts.tea_purtseladze') }}</h2>
		<!-- <h3>tea purtceladze</h3> -->
	</div>
</div>