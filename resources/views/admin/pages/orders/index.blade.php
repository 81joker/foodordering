@extends('admin.layouts.app')

@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">

            <div class="pd-20 card-box mb-30">
                <h4 class="text-blue h4 mb-3">Orders</h4>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Restaurant</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th scope="col" width="10%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr class="order-row" data-id="{{ $order->id }}" style="cursor:pointer;">
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->restaurant->name }}</td>
                                <td>{{ $order->total }} DH</td>
                                <td><span class="badge badge-info">{{ $order->order_status }}</span></td>
                                <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                <td> 
                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline-block" onclick="event.stopPropagation();">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit" onclick=" event.stopPropagation(); return confirm('Are you sure you want to delete this Order?');">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $orders->links('admin.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- MODAL --}}
<div class="modal fade" id="OrderModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Order Details</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <div id="order-lines-container">Loading...</div>
            </div>

            <div class="modal-footer">

                <select id="order-status" class="form-control" style="width:200px;">
                    <option value="pending">Pending</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="preparing">Preparing</option>
                    <option value="ready">Ready</option>
                    <option value="on_delivery">On delivery</option>
                    <option value="delivered">Delivered</option>
                    <option value="cancelled">Cancelled</option>
                </select>

                <button class="btn btn-primary" id="save-status">Save</button> 

                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div> 
<script>
let currentOrderId = null;

$('.order-row').on('click', function() {
    currentOrderId = $(this).data('id');
    
    $('#OrderModal').modal('show');
    $('#order-lines-container').html("Loading...");

    $.get(`/admin/orders/${currentOrderId}/lines`, function(data) {
        let html = `
            <h5>Order #${data.order.id}</h5>
            <p><b>User:</b> ${data.order.user_id}</p>
            <p><b>Total:</b> ${data.order.total} DH</p>

            <table class="table table-bordered mt-3">
                <thead><tr><th>Food</th><th>Qty</th><th>Price</th></tr></thead>
                <tbody>
        `;

        data.lines.forEach(l => {
            html += `
                <tr>
                    <td>${l.food.name}</td>
                    <td>${l.quantity}</td>
                    <td>${l.price}</td>
                </tr>
            `;
        });

        html += `</tbody></table>`;

        $('#order-lines-container').html(html);

        $('#order-status').val(data.order.order_status);
    });
});

$('#save-status').on('click', function() {
    $.post(`/admin/orders/${currentOrderId}/status`, {
        order_status: $('#order-status').val(),
        _token: '{{ csrf_token() }}'
    }, function() {
        location.reload();
    });
}); 
</script> 
@endsection

