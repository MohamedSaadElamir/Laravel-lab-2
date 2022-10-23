@extends('product.layout')
@section('content')
	<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('product.create') }}"> Add Product</a>
            </div>
        </div>
    </div>
	<br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>SN</th>
            <th>Product</th>
            <th>Description</th>
			<th>Created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
			<td>{{ $product->created_at }}</td>
            <td>
                <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('product.show',$product->id) }}"><span class="fa fa-address-book"></a>
                    <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}"><i class="fa fa-pencil"></i></a>
                    @csrf
                    @method('DELETE')
                    <!-- <button type="submit" class="btn btn-danger"><span class="fa fa-remove"></span></button> -->
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $products->links() !!}
@endsection


