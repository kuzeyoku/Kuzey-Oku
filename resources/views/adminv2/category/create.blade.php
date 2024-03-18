@extends(themeView('admin', 'layout.create'), ['tab' => true])
@section('form')
    @foreach (LanguageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {!! Form::label('title', __("admin/{$folder}.form_title")) !!} <span class="manitory">*</span>
            {!! Form::text("title[$lang->code]", null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_title_placeholder"),
            ]) !!}
            {!! Form::label("description[$lang->code]", __("admin/{$folder}.form_description")) !!}
            {!! Form::textarea("description[$lang->code]", null, ['class' => 'editor']) !!}
        </div>
    @endforeach
    <div class="row">
        <div class="col-lg-6">
            {!! Form::label('module', __("admin/{$folder}.form_module")) !!} <span class="manitory">*</span>
            {!! Form::select('module', $modules, null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-lg-6">
            {!! Form::label('parent', __("admin/{$folder}.form_parent")) !!}
            {!! Form::select('parent', $categories, null, ['class' => 'form-control']) !!}
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
            {!! Form::label('status_', __('admin/general.status')) !!} <span class="manitory">*</span>
            {!! Form::select('status', statusList(), 'default', ['class' => 'form-control']) !!}
        </div>
    </div>
@endsection
