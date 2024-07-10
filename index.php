<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Todo List</title>
	<link rel="stylesheet" type="text/css"
		href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">

	<style>
		body {
			font-family: 'Poppins', sans-serif;
			display: flex;
			align-items: center;
			justify-content: center;
			width: 100vw;
		}

		h1 {
			color: black;
			margin: 0;
			padding: 10px 20px;
			text-transform: uppercase;
			font-size: 24px;
			font-weight: normal;
			border-radius: 8px;
		}

		ul {
			list-style: none;
			margin: 0;
			padding: 0;
			margin-top: 5%;
		}

		.data li {
			background: #fff;
			height: 40px;
			line-height: 40px;
			color: #666;
			border-radius: 8px;
			border: 1px solid black;
			margin: 10px;
			padding-left: 10px;
			display: flex;
			justify-items: end;
		}

		.data li .spancom {
			position: absolute;
			background: #4c8e51;
			width: 40px;
			right: 705px;
			text-align: center;
			color: white;
			transition: 0.2s linear;
			opacity: 0;
			border-radius: 7px 0 0 7px;

		}

		li:hover .spancom {
			width: 60px;
			opacity: 1.0;
		}

		.data li .spansampah {
			position: absolute;
			background: #e74c3c;
			height: 40px;
			width: 0;
			right: 678px;
			text-align: center;
			display: inline-block;
			color: white;
			transition: 0.1s linear;
			opacity: 0;
			border-radius: 0 7px 7px 0;
		}

		li:hover .spansampah {
			width: 40px;
			opacity: 1.0;
		}


		input {
			font-size: 14px;
			background: #f7f7f7;
			width: 100%;
			padding: 13px 13px 13px 20px;
			box-sizing: border-box;
			color: #000000;
			border: 3px solid rgba(0, 0, 0, 0);
			align-items: center;
			transition: 0.3s;
		}

		input:focus {
			background: #fff;
			outline: none;
		}

		#container {
			width: 360px;
			background: #f7f7f7;
			border: 1px solid black;
			border-radius: 8px;
			margin-top: 50px;
			margin-bottom: 50px;
		}

		.tombol .fa-plus {
			float: right;
			background: transparent;
			border: none;
			font-size: 18px;
		}

		/* .text   {
			text-decoration: line-through;
		} */

		/* .completed {
			color: gray;
			text-decoration: line-through;
		} */

		@media screen and (max-width: 768px) {
			#container {
				width: 300px;
				margin-right: 10px;
			}

			.data li .spansampah {
				right: 53px;
			}

			.data li .spancom {
				right: 83px;
			}
		}
	</style>
</head>

<body>

	<div id="container">
		<h1>To-Do List <button class="tombol" type="submit" onclick="addTask()"> <i class="fa fa-plus"
					aria-hidden="true"></i></button> </h1>

		<input id="tambah" type="text" placeholder="Add New Todo Here">

		<ul class="data" id="data_todo">
			<!-- <li><span><i class="fa fa-trash"></i></span> text here</li> -->
		</ul>
		
	</div>
<p></p>
	
	<!-- <script>
		document.addEventListener('DOMContentLoaded', function () {
			displayTask();
		});

		function displayTask() {
			const todo = document.getElementById('data_todo');
			todo.innerHTML = '';

			fetch('backend.php')
				.then(response => response.json())
				.then(data => {
					data.forEach(task => {
						const list = document.createElement('li');
						list.classList.add('text');
						list.textContent = task.task_add;
						
						
						const btnArea = document.createElement('div');
						btnArea.classList.add('area');
						btnArea.innerHTML = `<span onclick="toggleTask(${task.id})" class="spancom"><i class="fa fa-check"></i></span>
						<span onclick="deleteTask(${task.id})" class="spansampah"><i class="fa fa-trash"></i></span>`


						// complete
						const spancom = document.createElement('span');
						spancom.classList.add('spancom');



						const complete = document.createElement('i');
						complete.classList.add("fa", "fa-check");


						// sampah
						const span = document.createElement('span');
						span.classList.add('spansampah')


						const sampah = document.createElement('i');
						sampah.classList.add("fa", "fa-trash");


						todo.append(list);
						list.append(btnArea)
						// list.append(spancom);
						// list.append(span);
						spancom.append(complete);
						span.append(sampah);

						// console.log(task)

					});
				})
		}

		// nambah todo
		function addTask() {
			const tambah = document.getElementById('tambah');
			const task = tambah.value.trim();
			if (task !== '') {
				fetch('backend.php', {
						method: 'POST',
						headers: {
							'Content-Type': 'application/json',
						},
						body: JSON.stringify({
							task
						}),
					})
					.then(() => {
						tambah.value = '';
						displayTask();
					});
			}
		}

		// check todo
		function toggleTask(id) {
			fetch(`backend.php?id=${id}`, {
					method: 'PUT',
				})
				.then(() => displayTasks());
				
		}

		// delete todo
		function deleteTask(id) {
			fetch(`backend.php?id=${id}`, {
					method: 'DELETE',
				})
				.then(() => displayTasks());
		}
	</script> -->

	<script src="app.js"></script>
</body>

</html>