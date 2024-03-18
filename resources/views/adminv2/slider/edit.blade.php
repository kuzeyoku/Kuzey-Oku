@extends(themeView('admin', 'layout.edit'), ['item' => $slider])
@section('form')
    {!! Form::file('image', [
        'class' => 'dropify',
        'data-default-file' => $slider->image_url,
        'accept' => '.png, .jpg, .jpeg, .gif',
    ]) !!}
    @foreach (languageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {!! Form::label("title[$lang->code]", __("admin/{$folder}.form_title")) !!}
            {!! Form::text("title[$lang->code]", $slider->titles[$lang->code] ?? null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_title_description"),
            ]) !!}
            {!! Form::label("description[$lang->code]", __("admin/{$folder}.form_description")) !!}
            {!! Form::textarea("description[$lang->code]", $slider->descriptions[$lang->code] ?? null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_description_placeholder"),
            ]) !!}
        </div>
    @endforeach
    <div class="row">
        <div class="col-lg-6">
            {!! Form::label('button', __("admin/{$folder}.form_button")) !!}
            {!! Form::text('button', $slider->button, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_button_placeholder"),
            ]) !!}
        </div>
        <div class="col-lg-6">
            {!! Form::label('video', __("admin/{$folder}.form_video")) !!}
            {!! Form::text('video', $slider->video, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_video_placeholder"),
            ]) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            {!! Form::label('order', __('admin/general.order')) !!} <span class="manitory">*</span>
            {!! Form::number('order', $slider->order, [
                'class' => 'form-control',
                'placeholder' => __('admin/general.order_placeholder'),
            ]) !!}
        </div>
        <div class="col-lg-6">
            {!! Form::label('status', __('admin/general.status')) !!} <span class="manitory">*</span>
            {!! Form::select('status', statusList(), $slider->status, ['class' => 'form-control']) !!}
        </div>
    </div>
@endsection
