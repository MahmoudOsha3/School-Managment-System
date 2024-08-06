<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="./style.css">

<style>
    #content main .table-data {
        display: flex;
        flex-wrap: wrap;
        grid-gap: 24px;
        margin-top: 24px;
        width: 100%;
        color: var(--dark);
    }
    .table-data > div {
        border-radius: 20px;
        background: var(--light);
        padding: 24px;
        overflow-x: auto;
    }
    .table-data .head {
        display: flex;
        align-items: center;
        grid-gap: 16px;
        margin-bottom: 24px;
    }
    .table-data .head h3 {
        margin-right: auto;
        font-size: 24px;
        font-weight: 600;
    }
    .table-data .head .bx {
        cursor: pointer;
    }

    .table-data .order {
        flex-grow: 1;
        flex-basis: 500px;
    }
    .table-data .order table {
        width: 100%;
        border-collapse: collapse;
    }
    .table-data .order table th {
        padding-bottom: 12px;
        font-size: 13px;
        text-align: left;
        border-bottom: 1px solid var(--grey);
        color : black ;
        font-size: 20px ;
        font-weight: bold ;
    }
    .table-data .order table td {
        padding: 16px 0;
        font-size: 18px ;
    }
    .table-data .order table tr td:first-child {
        display: flex;
        align-items: center;
        grid-gap: 12px;
        padding-left: 6px;
    }
    .table-data .order table td img {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        object-fit: cover;
    }
    .table-data .order table tbody tr:hover {
        background: var(--grey);
    }
    .table-data .order table tr td .status {
        font-size: 10px;
        padding: 6px 16px;
        color: var(--light);
        border-radius: 20px;
        font-weight: 700;
    }
    .table-data .order table tr td .status.completed {
        background: var(--blue);
    }
    .table-data .order table tr td .status.process {
        background: var(--yellow);
    }
    .table-data .order table tr td .status.pending {
        background: var(--orange);
    }

    a{
        padding: 10px 20px ;
        color :white ;
        background-color :green ;
        text-decoration :none ;
        font-size:20px ;
        margin: 120px 0 0 600px ;
    }

    .btn a{
        padding: 10px 10px ;
        color :white ;
        background-color :red ;
        text-decoration :none ;
        font-size:17px ;
        margin-left : 2px ;
    }
    .btn .view{
        background-color :rgb(6, 106, 193) ;
    }
    .btn .edit{
        background-color :rgb(4, 152, 4) ;
    }
    .btn .delete{
        background-color :rgb(182, 7, 7) ;
    }
</style>
	<title>AdminHub</title>
</head>
<body>


        <a href="">Create Posts</a>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3></h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>ID</th>
								<th>Title</th>
								<th>Made BY</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <p><?php echo e($posts['id']); ?></p>
                                    </td>
                                    <td><?php echo e($posts['title']); ?></td>
                                    <td><?php echo e($posts['made_by']); ?></td>
                                    <td><?php echo e($posts['date']); ?></td>
                                    <td class='btn'><a href="posts/view" class='view'>View</a><a href="" class='edit'>Edit</a><a href=""class='delete'>Delete</a></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>

	<script src="./script.js"></script>
</body>
</html>


<?php /**PATH D:\course laravel\routes\resources\views/products.blade.php ENDPATH**/ ?>