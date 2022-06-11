@section('tittle','Order Management')
@extends('backend.index')
@section('main')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-3">
        <h2 class="text-center">Order</h2>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                @if (session()->has('message'))
                <p class="alert alert-danger text-center" role="alert">{{ session()->get('message') }}</p>
                @endif
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                    <table id="example" class="table table-striped text-center align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Qty</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->qty }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td><span class="@if ($order->status == 'pending')
                                        badge-pending
                                    @elseif ($order->status == 'success')
                                        badge-success
                                    @elseif ($order->status == 'cancel')
                                        badge-cancel
                                    @endif">{{ $order->status }}</span></td>
                                    <td>
                                        <a class="btn btn-primary mx-1" href="{{ route('admin.orderView',$order->id) }}">View</a>
                                        <a class="btn btn-info mx-1" data-bs-toggle="modal" href="#exampleModal{{ $order->id }}">Edit</a>
                                        <a class="btn btn-danger mx-1" href="{{ route('admin.orderDelete',$order->id) }}">Delete</a>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Order Status</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('admin.orderStatus',$order->id) }}" method="post">
                                                    @csrf
                                                    <select name="status" class="form-control">
                                                        <option value="pending" class="text-warning">Pending</option>
                                                        <option value="success" class="text-success">Success</option>
                                                        <option value="cancel" class="text-danger">Cancel</option>
                                                    </select>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection