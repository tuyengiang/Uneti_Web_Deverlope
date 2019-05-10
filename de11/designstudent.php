<?php include 'inc/connect.php'; ?>
<?php
	if(isset($_POST["add"])){

		$masv=$_POST["masv"];
		$hoten=$_POST["tensv"];
		$gioitinh=$_POST["gioitinh"];
		$quequan=$_POST["quequan"];

		$sql="INSERT INTO sinhvien(masv,hoten,gioitinh,quequan)
			VALUES('{$masv}','{$hoten}','{$gioitinh}','{$quequan}')
		";

		$query=mysqli_query($conn,$sql);

		if($query){
			echo "Thêm sinh viên thành công";
		}else{
			echo "Thêm sinh viên thất bại".mysqli_error($conn);
		}



	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm sinh viên mới</title>
	<meta charset="utf-8">
</head>
<body>

<h2>Thêm mới sinh viên</h2>

<form action="" method="post">
	<label>Mã sinh viên</label>
	<input type="text" name="masv" placeholder="Nhập mã sinh viên">
	<br>

	<label>Tên sinh viên</label>
	<input type="text" name="tensv" placeholder="Nhập tên sinh viên">
	<br>

	<label>Giới tính</label>
	<input type="radio" name="gioitinh" value="1"> Nam
	<input type="radio" name="gioitinh" value="0"> Nữ
	<br>

	<label>Quê quán</label>
	<input type="text" name="quequan" placeholder="Nhập quê quán">
	<br>

	<button type="submit" name="add">Thêm sinh viên</button>

	<button type="button">Nhập</button>
	<button type="reset">Nhập lại</button>

</form>

<table>
	<tbody>
			<tr>
				<td>STT</td>
				<td>Mã sinh viên</td>
				<td>Tên sinh viên</td>
				<td>Giới tính</td>
				<td>Quê quán</td>
			</tr>
			<?php
				$sql1="SELECT * FROM sinhvien";
				$query=mysqli_query($conn,$sql1);
				while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)):

			?>
			<tr>
				<td><?=$row["id"]; ?></td>
				<td><?=$row["masv"]; ?></td>
				<td><?=$row["hoten"]; ?></td>
				<td>
					<?php
							if($row["gioitinh"]==1){
								echo "Nam";
							}else{
								echo "Nữ";
							}

					?>
				</td>
				<td><?=$row["quequan"]; ?></td>
			</tr>

		<?php endwhile;?>

	</tbody>
</table>
</body>
</html>
