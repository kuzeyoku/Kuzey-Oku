@php
    unset($parentList[$menu->id]);
@endphp
{{ Form::open(['url' => route("admin.{$route}.update", $menu), 'method' => 'put']) }}
@foreach (languageList() as $key => $lang)
    <div id="{{ $lang->code }}" class="tab-pane fade @if ($loop->first) active show @endif">
        {{ Html::label(__("admin/{$folder}.form_title")) }}
        {{ Form::text("title[$lang->code]", $menu->titles[$lang->code] ?? null, [
            'class' => 'form-control',
            'placeholder' => __("admin/{$folder}.form_title_placeholder"),
        ]) }}
    </div>
@endforeach
{{ Form::label('url', __("admin/{$folder}.form_url")) }}
{{ Form::text('url', $menu->url, [
    'class' => 'form-control',
    'placeholder' => __("admin/{$folder}.form_url_placeholder"),
]) }}
{{ Form::label('order', __("admin/{$folder}.form_order")) }}
{{ Form::number('order', $menu->order ?? 0, [
    'class' => 'form-control',
    'placeholder' => __("admin/{$folder}.form_order_placeholder"),
]) }}
{{ Form::label('parent', __("admin/{$folder}.form_parent")) }}
{{ Form::select('parent_id', $parentList, $menu->parent_id, [
    'class' => 'form-control',
    'placeholder' => __('admin/general.select'),
]) }}
<label class="inputcheck">
    {{ Form::label('blank', __("admin/{$folder}.form_blank")) }}
    {{ Form::checkbox('blank', true, $menu->blank) }}
    <span class="checkmark"></span>
</label>
{{ Form::hidden('type', $type) }}
{{ Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) }}
{{ Form::close() }}
