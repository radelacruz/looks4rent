@extends('layouts.app')
@section('title','Order Details')
@section('content')
		<div class="container">
			<h4 class="text-center py-3">Orders Admin Page</h4>
			<div class="row">
				<div class="col-sm-8 offset-sm-2">
					<table class="table table-responsive table-striped">
						<thead>
							<tr class="text-center">
								<th>Transaction Code</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$order_query = "SELECT o.id, o.transaction_code, o.status_id, s.name AS status FROM orders o JOIN statuses s ON (o.status_id = s.id);";
								$orders = mysqli_query($conn, $order_query);
								foreach ($orders as $order) {
									// var_dump($order);
							?>
								<tr>
									<td><?php echo $order['transaction_code']; ?></td>
									<td><?php echo $order['status']; ?></td>
									<td>
										<?php if($order['status'] == "pending"){ ?>
											<a href="../controllers/complete_order.php?id=<?php echo $order['id']; ?>" class="btn btn-success">Complete Order</a>
											<a href="../controllers/cancel_order.php?id=<?php echo $order['id']; ?>" class="btn btn-danger">Cancel Order</a>
										<?php }; ?>

									</td>
								</tr>
								<?php } ?>
						</tbody>

					</table>
				</div>
			</div>
		</div> 




@endsection