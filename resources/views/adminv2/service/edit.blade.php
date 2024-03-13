@extends(themeView('admin', 'layout.edit'), ['item' => $service])
@section('form')
    {!! Form::file('image', [
        'class' => 'dropify',
        'data-default-file' => $service->image_url,
        'accept' => '.png, .jpg, .jpeg, .gif',
    ]) !!}
    @foreach (LanguageList() as $key => $lang)
        <div id="{{ $lang->code }}" class="tab-pane mb-3 @if ($loop->first) active show @endif">
            {{ Form::label("title[$lang->code]", __("admin/{$folder}.form_title")) }} <span class="manitory">*</span>
            {{ Form::text("title[$lang->code]", $service->titles[$lang->code] ?? null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_title_placeholder"),
            ]) }}
            {{ Form::label('description', __("admin/{$folder}.form_description")) }}
            {{ Form::textarea("description[$lang->code]", $service->descriptions[$lang->code] ?? null, ['class' => 'editor']) }}
        </div>
    @endforeach
    <div class="row">
        <div class="col-lg-4">
            {{ Form::label('category', __("admin/{$folder}.form_category")) }}
            {{ Form::select('category_id', $categories, $service->category, ['class' => 'form-control']) }}
        </div>
        <div class="col-lg-4">
            {{ Form::label('order', __('admin/general.order')) }} <span class="manitory">*</span>
            {{ Form::number('order', $service->order ?? 0, [
                'class' => 'form-control',
                'placeholder' => __('admin/general.order_placeholder'),
            ]) }}
        </div>
        <div class="col-lg-4">
            {{ Form::label('status_', __('admin/general.status')) }} <span class="manitory">*</span>
            {{ Form::select('status', statusList(), $service->status ?? 'default', ['class' => 'form-control']) }}
        </div>
    </div>
@endsection
