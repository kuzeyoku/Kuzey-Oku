@extends(themeView('admin', 'layout.edit'), ['tab' => true, 'item' => $slider])
@section('form')
    {{ html()->file('image')->attribute('data-allowed-file-extensions', 'png jpg jpeg gif')->attribute('data-default->file', $slider->getFirstMediaUrl($module->COVER_COLLECTION()))->accept('.png, .jpg, .jpeg, .gif')->class('dropify-image') }}

    @foreach (languageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {{ Form::label("title[$lang->code]", __("admin/{$folder}.form_title")) }}
            {{ Form::text("title[$lang->code]", $slider->titles[$lang->code] ?? null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_title_description"),
            ]) }}
            {{ Form::label("description[$lang->code]", __("admin/{$folder}.form_description")) }}
            {{ Form::textarea("description[$lang->code]", $slider->descriptions[$lang->code] ?? null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_description_placeholder"),
            ]) }}
        </div>
    @endforeach
    <div class="row">
        <div class="col-lg-6">
            {{ Form::label('button', __("admin/{$folder}.form_button")) }}
            {{ Form::text('button', $slider->button, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_button_placeholder"),
            ]) }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('video', __("admin/{$folder}.form_video")) }}
            {{ Form::text('video', $slider->video, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_video_placeholder"),
            ]) }}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            {{ Form::label(__('admin/general.order')) }}
            {{ Form::number('order', $slider->order)->placeholder(__('admin/general.order_placeholder'))->class('form-control') }}
        </div>
        <div class="col-lg-6">
            {{ Form::label('status', __('admin/general.status')) }}
            {{ Form::select('status', statusList(), $slider->status, ['class' => 'form-control']) }}
        </div>
    </div>
@endsection
