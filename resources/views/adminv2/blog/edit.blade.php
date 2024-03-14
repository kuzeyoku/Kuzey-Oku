@extends(themeView('admin', 'layout.edit'), ['item' => $blog])
@section('form')
    {!! Form::file('image', [
        'class' => 'dropify',
        'data-default-file' => $blog->image_url,
        'accept' => '.png, .jpg, .jpeg, .gif',
    ]) !!}
    @foreach (languageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {!! Form::label('title', __("admin/{$folder}.form_title")) !!} <span class="manitory">*</span>
            {!! Form::text("title[$lang->code]", $blog->titles[$lang->code] ?? null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_title_placeholder"),
            ]) !!}
            {!! Form::label('description', __("admin/{$folder}.form_description")) !!}
            {!! Form::textarea("description[$lang->code]", $blog->descriptions[$lang->code] ?? null, [
                'class' => 'editor',
            ]) !!}
            {!! Form::label('tags', __("admin/{$folder}.form_tags")) !!}
            {!! Form::text("tags[$lang->code]", $blog->tags[$lang->code] ?? null, [
                'class' => 'form-control',
                'placeholder' => __("admin/{$folder}.form_tags_placeholder"),
            ]) !!}
        </div>
    @endforeach
    <div class="row">
        <div class="col-lg-4">
            {!! Form::label('category', __("admin/{$folder}.form_category")) !!}
            {!! Form::select('category_id', $categories, $blog->category_id, ['class' => 'form-control']) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('order', __('admin/general.order')) !!} <span class="manitory">*</span>
            {!! Form::number('order', $blog->order, [
                'class' => 'form-control',
                'placeholder' => __('admin/general.order_placeholder'),
            ]) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('status_', __('admin/general.status')) !!} <span class="manitory">*</span>
            {!! Form::select('status', statusList(), $blog->status, ['class' => 'form-control']) !!}

        </div>
    </div>
@endsection
