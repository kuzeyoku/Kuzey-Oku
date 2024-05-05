@extends(themeView('admin', 'layout.create'), ['tab' => true])
@section('form')
    {!! Form::file('image', ['class' => 'dropify-image', 'accept' => '.png, .jpg, .jpeg, .gif']) !!}
    @foreach (languageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {!! Form::label("title[$lang->code]", __("admin/{$folder}.form_title")) !!}
            {!! Form::text("title[$lang->code]", null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_title_placeholder"),
            ]) !!}
            {!! Form::label("description[$lang->code]", __("admin/{$folder}.form_description")) !!}
            {!! Form::textarea("description[$lang->code]", null, [
                'rows' => 3,
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_description_placeholder"),
            ]) !!}
        </div>
    @endforeach
    <div class="row">
        <div class="col-lg-6">
            {!! Form::label('button', __("admin/{$folder}.form_button")) !!}
            {!! Form::text('button', null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_button_placeholder"),
            ]) !!}
        </div>
        <div class="col-lg-6">
            {!! Form::label('video', __("admin/{$folder}.form_video")) !!}
            {!! Form::text('video', null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_video_placeholder"),
            ]) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            {!! Form::label('order', __('admin/general.order')) !!} <span class="manitory">*</span>
            {!! Form::number('order', 0, [
                'class' => 'form-control',
                'placeholder' => __('admin/general.order_placeholder'),
            ]) !!}
        </div>
        <div class="col-lg-6">
            {!! Form::label('status', __('admin/general.status')) !!} <span class="manitory">*</span>
            {!! Form::select('status', statusList(), 'default', ['class' => 'form-control']) !!}
        </div>
    </div>
@endsection
