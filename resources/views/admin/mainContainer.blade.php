<!DOCTYPE html>
<html>
<head>
    <style>
		/* public/css/styles.css */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 18px;
    text-align: left;
}

table th, table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
}

table th {
    background-color: #f2f2f2;
    color: #333;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f1f1f1;
}

.btn-delete {
    color: #ff0000;
    cursor: pointer;
    background: none;
    border: none;
}

.btn-delete:hover {
    color: #cc0000;
}

	</style>
</head>

<body>
<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="admincss/vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue">Amed Saaid!</div>
						</h4>
						
					</div>
				</div>
			</div>
			</div>
			<table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
					<th></th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>1</td>
                        <td>user1</td>
                        <td>user1@gmail.com</td>
						<td>
						<form>
                                    <button type="submit" class="btn-delete">Supprimer</button>
                                </form>
						</td>
                    </tr>
					<tr>
						<td>2</td>
						<td>amine</td>
						<td>amine@gmail.com</td>
						<td><form>
                                    <button type="submit" class="btn-delete">Supprimer</button>
                                </form></td>
					</tr>
					<tr>
						<td>3</td>
						<td>wiam</td>
						<td>wiam@gmail.com</td>
						<td><form>
                                    <button type="submit" class="btn-delete">Supprimer</button>
                                </form></td>
					</tr>
                
            </tbody>
        </table>
		</div>
	</div>
</body>	
</html>
    <!-- end of main container-->
	<!-- js -->
	
	