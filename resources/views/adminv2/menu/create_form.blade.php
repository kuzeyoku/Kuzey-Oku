{!! Form::open(['route' => "admin.{$route}.store", 'method' => 'post']) !!}
<div class="tab-content">
    @foreach (languageList() as $key => $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {!! Form::label('title', __("admin/{$folder}.form_title")) !!} <span class="manitory">*</span>
            {!! Form::text("title[$lang->code]", null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_title_placeholder"),
            ]) !!}
        </div>
    @endforeach
</div>
{!! Form::label('urlSelect', __("admin/{$folder}.form_urlSelect")) !!}
{!! Form::select('urlSelect', $urlList, null, [
    'class' => 'form-control',
    'placeholder' => __('admin/general.select'),
]) !!}
<span>{{ __("admin/{$folder}.form_urlSelectNote") }}</span>
{!! Form::label('url', __("admin/{$folder}.form_url")) !!}
{!! Form::text('url', null, [
    'class' => 'form-control',
    'placeholder' => __("admin/{$folder}.form_url_placeholder"),
]) !!}
{!! Form::label('order', __("admin/{$folder}.form_order")) !!}
{!! Form::number('order', 0, [
    'class' => 'form-control',
    'placeholder' => __("admin/{$folder}.form_order_placeholder"),
]) !!}
{!! Form::label('parent', __("admin/{$folder}.form_parent")) !!}
{!! Form::select('parent_id', $parentList, 0, [
    'class' => 'form-control',
    'placeholder' => __('admin/general.select'),
]) !!}
<label class="inputcheck">
    {!! Form::label('blank', __("admin/{$folder}.form_blank")) !!}
    {!! Form::checkbox('blank', true, false) !!}
    <span class="checkmark"></span>
</label>
{!! Form::hidden('type', $type) !!}
{!! Form::submit(__('admin/general.save'), ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
