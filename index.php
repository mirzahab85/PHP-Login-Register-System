<?php
session_start();

if (!isset($_SESSION['username'])) {
	exit('<p style="color:red"><strong>You must log in first.</strong></p>');
}

include('database.php');
include('includes/header-login.php');

$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
?>

<style>
	.img {
		height: 50px;
		width: 50px;
		border-radius: 50%;
	}

	#top {
		display:flex;
		justify-content: space-around;
		margin-bottom:-40px;	
	}

	#filtering {
		width: 500px;
		text-align:center;
	}

</style>
<div class="container">
	<h1> Welcome <span style="color:orange"><?php if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></span> to your Phone Book</h1> </br>
	<img style="padding-left:45%;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAABVlBMVEX+3AH////+/v7iBxQCAgDa2dm4Gxr+2gDhAAC1AAD/4AD/3gD/4gDb2tr/4QDX1tb+4Tz+5WD+7JP+/PDo5+f+6Hv+7Zr/+dz+8bP+/fX+9MW1Gxn+4kb+6oT///v+3hr+53H+9tH+41P+8Kz+++r+9cn+64z++uP19fX+3y3+5mn+6oP+76IAAAn+6He3EA//87wAABfjDhn47u7gJi1/bw0AABrkuLjLbGzrzMzw2dnCKSr0urzThYX2yMntgYTEGxzXvBiznA98bACbiR7CqRHoyhdvYRMgHxU7NRJdVBzZvRVJQhkwLRKurq6fn5+Li4tcXFvExMSahg16agCjjhFxcXG4oAtXTANJQAsvLy8qKip7bBkTEgmWhy/NtTCwnDBbUyLGeHjcpKTCWlm9Ojq+RUTLjY33vsDqcHTmQ0nlMDfpX2PEVFPu0NDvkpXyqKvnUVbO0iihAAATYElEQVR4nNWd+X8TN97HRw5EvkJ8xHZsbI+v+IpJTJw0kDRAaGNaaPd4WJbt7vLsPqVAoeXo///LI2kuzUgaS3PE9ucXXsQe6fu2jq/O72ggdjWrldq0W9gvtfKdeg6r0yo1Ct3p3qDajD97Lc7Eq+3dfmeUgUgaK/znzKjT363EyhkXYbPSbel8Mg6pPp60qzFZEgthu9zRpOBoTi3Xr8VBGTlhsZvXFOGo0swVKlEbFC1hr5xTLTuGUm/sRWpThIS9SS4knQWZ2W9HZ1ZkhNNONHgmpF7uRWRYNISDUuC2J4bMR1NboyCs1SPHMxj1bgSeMjzhRI+HjzBq/dAOJCRhtRB99fRAlkI2yFCE1X68dBZjcUmEzcJ18BHGRoi6Gpxwcl18RJNrJ6zF2L/wBPXatRL2YvIPvoydYM0xEGHh+vmIutdE2L7mCuoI5gbXQbi/LD7CWI6dsDJaJiAuRtUBgCLhZLl8hFGxNSoRNiOdIQUVzMdG2F42myVdpcNRIFyBGmoJTuMgHK8OIELsR05YHC0byi35xihJWFk2EauR5CBOjnBvlWqoLbn+Roqwu5KAmtaOirC8ooAalJlRSRD2VxVQzmssJmysLiBC3A1PuMIliLW4FBcRLmuyK62FiAsIV2ikJtKi7safcFXdhEuwHZywtg6ACNHX9fsRttcDEMlvAOdDWFy23fLSffaoxITNFZtN+KoThLCzbKtVBA/UCVfeEbolHtyICNekG3UERcdUBIRr1MtYEvU2AsLcsu0NIMG6Bp9wxYfbfEH+HiOXcDUXLRaK3xR5hNVlmxpUI1nC8bItDSq4L0c4Xc86isWbZnAIl21mKMkQtpZtZCixq/0M4fpMmbhi+1OGcJ1mFDzlFhGuxbqFn5iVKQ/h2rpCR5mmL2Fj2faFl3dr0U3YC1ZH0+ks0q10JmJjgwn2fAhbARJMZ7XLxycn35x8ezVPZ1cBsiUmHKgXYTp7+eTODUvfncxXgNG9uugizCsnlr36/oZbT+fZGIxWU15EWFEtwrT+9AajO98uHdHl9mlC1SLMPrvDAiL9oC+7pub5hKqtMHvFB7xx48dlI9ItkSI8UEslLShBrO/jMVxeLR6h6vKaLuRDerLktkj5RIewrJZG1uxk/rST2Pkzi/j4Vjymy6rPIVRLIX1lkOyQZ7cZwrt6PJZLiyVUXLvI/khA/gISWOCvDOKSfYazym8Tqm3EWEX4PybhnxjCO+qFmMncupU1dCudVn7crZyXUNFVZJ8sIrzxUsHGDB66a88uHz9//s03f/vbN89fXD2boz+FwLS9vkWoeIMJmp7izybh38N0p1lt/vLkH4zvufOPkys9eyuoa933EKqlk760zEhgRLDDAt74SpIwo52IHeudn16gsgwG6SZUXMdPP7ZM+OcWtyvFmsulpX8n5DP04/N5kOpqnULRAo1nsieOAf/8+7/4lj2TMstq0b766Sqt3jWPacKm4sPZf0uYdSX3w4urKK1Xz6EyY5MiVN3xlSJ8LEWoyxGiJvlcEdFcddOCVNIoyzDrnUKLpTrYHVOEioBa9rmEQXLtMO2eg925e/eru6JiVXGxWE2bUHklP/1SglCyL83+5y75+r+e/O/j/zybz0ej+Xx++fLbp18xKf6gVohwzyZUvrCcmS9uPXdlzUnrV//97+UID2Gs9chMJo3Gb89e/OTORtbFWtq3CdXPJWReLST8t7w56TR3qTVzKzt//AOV5FNFwpFFWFRfRKQdokCSzmKBEOS39q95qZgkmQdr6hMnrPSzRYCvolqqyWTTV/+Ha+udK1WPSKZQWgBfgZXlrCO69CLC+WE6O3/x4kpTXzZomYRBpuN+61BY30VSR22hmWOQBHWDMNh2zIKWGE0rDCvcELXAZy98ByPLX/cmwgM3LfCeYUYXe4xlLybaahDCesCn03PRzG5lALU6IQz8eFr/iQt4sjKAeKKvBdk0tJThjcC/u1whQDhAhKEOeWXnnin6qxeZlehFTcEaIgwXRyeDnPFTyzW+ehJktSFWFRCh+savW2h8rD27evn46nKeDrPAGY86iDCKA8+ZdFowP1i2dKA1V9GuCFXVAkyd1kpVTfl4QnBBEowWCkLSxiNUS0O4QwXhMLOFaXtQrFarxUF7Wj4YXQ/mAeppgg7a5AVHjZpxfy5hyFiFbpfrsVOiyYUGqvHeHoGj8sBho4X+Wt2NN+INjtajgQTIx5YL1EoVLp1D2ZvEF5cJASaAhrM5iCk6Zw5H5/ThMyErMUQ/JWqjzAlhIo4r21AvDBbjmYzNaCPYGhr1SPaakUfEAZKgtu9fO1nIYlRRiC0T8qYBmplDMbrWgBpfm9+3LICsFKKLdQcnlgGanUEpktSh3giCZzKCQfhw2UR6xfZMmuOkpqHpYK5cCYpnU/a6ndAxwfNNm6qAwy1a/+mFaQkwM+72QuJZkNVpK1Tv6iCRxgdbllmBrzdDrTMJW3geSFAp14NR4riDVjJWBzoq2n9SD4sIYb3QbkaJZ0NWaw310SuOHWklQV2PqTkjRpVitN9nEDEdRVmc7o8UyhLmnC4GtKjnYMMBH0i1RggzeeOdFDHRUZTVdjmfkXtVxsTh6LlvcNGVF+wuSkfLNaY9ED8dRQl6tUJH98eEebu5OTVU1+yNp6nzaVU4UEVZjK+l6PiYxdqkJcKEo7ZD0LRnEyPNLks4bjrfqLChkNEktlOuXWfRcYRzr+6V85zBT9exC9ScP+c0egJMFaM7nDXqMPvLhnOE7ahMXOMC2KeKp0oHsaxr9MlZmK9SjF2TEY0z92JwB+GEFwlqY7OXheMeZbe7G8lrLXdZTwDNiFKA+m5ixegsoQrbRf4b5geOfWDgaV8lbd/T2qj2in+PxnRF8Qyh1tSv0IXCxLtoaMy2BRwXacZV5sMCNB9n8lDWuuwftfLKc/HEcwCatqvxNtcg3fWuicCAu6AGaxr/1B7U14sRFAWDFFgR7ltAbXdtGEFRuEABi5r4frqrW11l+W7yNjW/IAqwt2zjZeR793UENL/rQLC7DoXoe0o9jwj9js9O1oLQ77II3sff9f182eZLyO8QN5wiQr9avL/2hBVE2PQhbK0FoU8theTUl8/x0vxaEPr0NDlC2BITdtadsEQIfYLu1BnCZY9zOJMdn3Nr+KC35hssIudNDmztLBMSgOHWDmOT2BvgyAOa78U1nSXc3t4ZLmXaiPPc2dq+yRL6VELzJLvPaQwmm7Otmze3t7cMyutcL00MMd7Nre0ZQyh+x13eJPSJNdD0pnaxjRCRtm8iSgMzRlAz9eEOotsm+W5dqBB2TUJxQ4RFhvBng5BQosLc2nFAo2O1UhtitpsmHAHcTrGEwqkFCQCi+V7OgxVvaq9T9x1Ei9MgRahDxzo1Ys8zmIygbbvzurnzyyGTKCgJ7bdvdgmPmELvDBGcpt5seRDdrDe3CK0BPPQA80WQhoRqBz29ZaTD09br1BvWWwhjdbZsQmFnBGtewrNU6t6OgJDDazGb0F5tbTlfE0C5AO+nDu+xhKL5n3FNlhAKT2Aij+lJbZbaTF3IIUaurfubm6nXLKHQF1RtQvF3ykylf3O4mfoZ//bXjIeqwukhyvs+SyhapTACtRuEwjNRDYbwIoV+yLfbRid3TXCGa3qHct5MJdjeS1QBuxSh8HLXAUN4H+dziH5K4oTNlhQbmumOUGazjyTjX1hA0fQPFilCYTVlJhcggTNCv+UFIqS81g4Z60SDanZPLk97mjok2bLNMCEqHvNtAiahqDcdsbX+nol4fuacUrFIh+4OUgVp2+YiZK7REhiamW6y/l44xbdi8JiEVVE1ZRO8b2Z2mLrwTDNoF2c7OMPFmcI41H9tHzL0+k53sqcpK09OJRVND2HTRSh0+t6BKcpv43zT/EEPXwPRsIXv2IWfeanohO6/Nfk2byd/5RAKJk9WVDqLUDRPZteEwcOkhYgZ450uEr5DC/A4yelJBcNSI9wARShwKnDAVtNPyaPz2w7ju5nw9w+NB04dPgz4npMR/4YoHAMvYY97dwb9EmySH5Ibj2zEzVTq4+kwekiU4uzdpsOHADeSn3iELZ7dJcAQUkdQ6G96h204yV+TGxvHdk3FfU7q3mmk836c1ulHq38hfOdHG8kP3CP/PE9HveWKjn3Jcxm8dX1wvLGxQdVUCzKaksSWzE7vpajiIwW4sZF8wCVkVkPd7yinCBO8V6b3eYRfo0J0F6MB+fH1TNwpSuOdvX7rxiMFuCEowgQzuyUHoPmECc4AdcwjBL8RxKNHtze9kG8uTmc+fb8/G6a7t+nBQ3y4ADf4rTCR8ES0hHXSOfJrKf6g6LkWwF0TBg8IIamqLGTqHFEmFDCN3Gf336GW56Fz+DaSv/OT81zcMg4E8WupkYDnSBE7bCNfem8ionI832SEDN38+O70zHf9xsl3eHb67uM5h47wHZk5JdkBG0mGXmWyTycKCM0Pm65Nf36yww1biPE2C0kKM5X65eL16afZjDuMGc5m90/f3ftIvsjCITy7/DDgF34RUmMVqFtLEnQ2LCEeyzqHaCE3WaeeEsZjprK6OVOb52/e/vLzxcXFOyT0z72Pb9+cGx8d8tiM4nvk8AnrKLUeTJ9/FhE6X5haJxPhQJDwQwrRKEgBpIl6aMKaWEIwC8+pnkYGnPGaYYi5WgoPqOOzCwmNU3vGg4LzGACPbFw6XgQpq9sMHirCM1GvBcjBPNihh5c+hPS3mmREC6ei32545EEk1TUkJaZ75MVDgF8Lu2W8lgjrbep0m6fRe99v0aTKsdqn7w8xSZ8xhAQSF2UgSvQYjw4Dfhb7HdBx84FyyZewAksuxgJk1qKcTz/xEDElLksVztu3Sc3k0mHAhz6OFey7+FAH0vYvwwP3qT3Q9DkX5epQGR0fP0K+EoMKUclnqOAeCeEIIG/ORFlBWVupQ+/rLdhaik977dFP+SXui2iVJ6q354+MQrWF/ov+RtB82CxAubERKJIrJGABIdkyhvWKZKKLEWnaY1OLoIIAgiY5HmxP7cWExooNfTbcN92zpAqjulAblDEEWG6xxfCwhE3Lg0oxgtlxnIiisZqXr5sxRygMDu+tZNZADx7IXFUGid9jQ0zy57wsnz0C47zBmvfuPDsGH8y3ZW6bf44JMfkbfzrhzr5acO62sXVU8IZHZ10A5rw7iLxMPrHDmygAZZqg+/oBD4b7R9eUi7MWxWQTQ01NbjyQAaTPtPFfQc5/Dym9mMGcGuJlBH7diJYx+d7XE9sZU5cpYIHLIniXLLVxnJFzG4mHEfqN5NEnSS9Inf+t81EEhNQ5KSjp/MHZHxExJpGPkF3iofZbqkqEVFOEkuMbxPjgtwgYk8mHQ+mlOmcpkd8IfQip5WFmL9+P8UNIRsQ3UziGU6OXMBQJnZAuzPE9f8YQdRU9+VmBjz5oInihsy+hvR+gdicBtUfU5wSBTCY/fA3UIqLYJ0u5bwJeSGj3NlBuFO4wgl9/V4VMJo8+n6nxJaj3URbFGD6EYGA9rzeVcsaMw6/fJ2Up0feOP39SxMOyIlwJ3xy/iNA5A6AXVXPHjz94+GERJf786PcvQTZZQdXa1GVePSpPSG2Rc3ZKZSBnD768P0qa8qIhfXj4BdfNANtVoGKNnsXdqAShM3yDrWoAM6wdpQdfPr//48OxzXr82x/vP395YOxSBUvXHnHDkth8CUI6EMgkkC02JkEZDmezmXMOKFh69Jo8tWEfkBDsuzY+wu3xOqmGS4beV+ksAlhISMePwitUcZ4tkeOjL/wuBpQgdIXIgmP2+Mn18rkuxELxUEaFEDToaTRsqfn/iPn2XbZIAEoRegIVwJKyd4yIr+o+HCQFKEcIyu69cri/hHIExYbHigVuQomQOWoDW7JBESPCA4OW1wTvBkU4QvZkH+zsXRsjGj8ykSNxSKhICUFF8wqOricmARo8ssG5eGu/IQlBkT29CLVCL2ZIAHp9TjQzfbDYYGVCwI1VCzthBzq+eKDGC2wK6015q1UIvV2qmV2mH0+vg1pGP8PNsaFitBIh2OPkR37TbjViSNQquqLQeNJNMAAhqPKC3GBGbYzzjQwPB4kW5JTrLbQyDKGgphqQrZpEYGQpvLwwuJ5g6T5KQjS3Fl/I1MbTUPH4AAnQKo4ECXW/FZmoCD0jca8NsB40Di3+9fyD7MoOY0ITLopyCvWSasxPgCNeH/gHSoYj9QIMSgh8LhfbRVnYK8pRAskY+7LDtGgIQXG8yCDUmkalXWPsIWZDDW/al4inCw8EW0uxEQJ6scSvLLVca1Ib8MyrDva6jY5U6FXYCVRBQxLSC16LObVR56DRL5Qn3Um50NhvdUb4z3LPk6N5SyGkjrHEKDJNWxohdZQlLr588PoZDSEa/Ucb8d/NN5afJcVHiNxjK5b3U8DRJGj/SSsKQtQtRv6iEQhb7UhMi4gQqR3hi0Yg7OwqzHH9FRkh0t5BFF0r1PK7UdROS1ESAvwSjlBvOIIw16hFVnqGIiYERrz/ABUW2kH6I1b0hFjFWgFHwpce8sBcq1uJgQ4rHkKiYrvbz4804WvWyAejeqlcC+vUfRUjoaFmsVLbLfdLrXwnZ6reaZX2++VprVKMqdxo/T+7zDkLqhDAIQAAAABJRU5ErkJggg==">
	</br></br>
</div>

<div id="top">
	<div id="filter" class="data">
		<input id="filtering" placeholder="Search by first name..." onkeyup="filterData()" />
	</div>

	<div id="contact">
		<h2 id="addContact" style="color:#3A57AF"><a href='add.php'><i class="fas fa-user-alt"> Add a Contact</i></a></h2>
	</div>
</div>

<table id="table">

	<tr>
		<th>Image</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Address</th>
		<th>Phone</th>
		<th>Action</th>
	</tr>

	<?php while ($row = mysqli_fetch_assoc($result)) { ?>

		<tr>
			<td> <?php echo "<img class = 'img' src='images/" . $row['image'] . "'>"; ?> </td>
			<td> <?php echo $row['first_name']; ?> </td>
			<td> <?php echo $row['last_name']; ?> </td>
			<td> <?php echo $row['email']; ?> </td>
			<td> <?php echo $row['address']; ?> </td>
			<td> <?php echo $row['phone']; ?> </td>
			<td>
				<a class="viewbutton" href=<?php echo 'view.php?id=' . $row['ID']; ?>><i class="fas fa-eye"></i></a>
				<a class="editbutton" href=<?php echo 'edit.php?id=' . $row['ID']; ?>><i class="fas fa-edit"></i></a>
				<a class="deletebutton" href=<?php echo 'delete.php?id=' . $row['ID']; ?>><i class="fas fa-trash-alt"></i></a>
			</td>
		</tr>
	<?php } ?>

</table>

<br><br><br><br>

<script>
	function filterData() {

		var input, filter, table, tr, td, i, txtValue;
		input = document.getElementById("filtering");
		filter = input.value.toUpperCase();
		table = document.getElementById("table");
		tr = table.getElementsByTagName("tr");

		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[1];
			if (td) {
				txtValue = td.textContent || td.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";	
				}
			}
		}
	}
</script>

<?php include('includes/footer.php'); ?>