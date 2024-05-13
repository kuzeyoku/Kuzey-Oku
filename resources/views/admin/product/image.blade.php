@extends(themeView('admin', 'layout.image'), ['item' => $product])
@section('form')
    {{ Form::hidden('product_id', $product->id) }}
@endsection
