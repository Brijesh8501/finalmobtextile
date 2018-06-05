<nav style="background:#3CF; font-family:Georgia, 'Times New Roman', Times, serif; font-weight:bold;">
<div>
	    <!--/.navbar-header-->
	    <div style="float:right;">
	        <ul class="nav navbar-nav" style="margin-right:100px;margin-top:5px;">
             <li class="panel active"> <a href="index" >Dashboard </a> </li>
             <?php 
			   if($row_result['Role']=='Company')
			   {?>
               <li class="dropdown"><a href="webrenewdate">Renew Website</a> </li>
               <?php
			   }
			   else
			   {
			 if($row_result['Role']=='Admin' || $row_result['Role']=='Manager')
 {
	 ?><li class="dropdown"><a href="registrationlistpage" >Registration</a> </li>
     <?php if($row_result['Name']=='MICKY AHIR'){ ?>
     <li class="dropdown"><a href="totalrecordsdatedelete">Delete</a> </li>
     <?php }} ?>
    	        <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-task"></i><span>Challan</span></a>
		        	   <ul class="dropdown-menu">
			            <li><a href="beam_d_c_listpage">Beam&nbsp;&nbsp;[Ctrl+Shift+B]</a></li>
			            <li><a href="bobbinlistpage">Bobbin&nbsp;&nbsp;[Ctrl+Shift+O]</a></li>
                        <li><a href="taka_d_c_list">Taka&nbsp;&nbsp;[Ctrl+Shift+P]</a></li>
                        <li><a href="saree_d_c_list">Saree&nbsp;&nbsp;[Ctrl+Shift+S]</a></li>

		              </ul>
		        </li>
                <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-task"></i><span>Invoice</span></a>
		        	   <ul class="dropdown-menu">
			            <li><a href="beam_invoicelist">Beam&nbsp;&nbsp;[Ctrl+1]</a></li>
			            <li><a href="bobbininovielist">Bobbin&nbsp;&nbsp;[Ctrl+2]</a></li>
                        <li><a href="taka_invoice85_list">Taka&nbsp;&nbsp;[Ctrl+3]</a></li>
                        <li><a href="saree_invoice85_list">Saree&nbsp;&nbsp;[Ctrl+4]</a></li>

		              </ul>
		        </li>
               <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-task"></i><span>Profile1</span></a>
		        	   <ul class="dropdown-menu">
			            <li><a href="countrylistpage">Country</a></li>
			            <li><a href="statelistpage">State</a></li>
                        <li><a href="citylistpage">City</a></li>
                        <li><a href="couriercomplistpage">Courier-Company&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Shift+F1]</a></li>
                        <li><a href="courierentrylist">Courier Entry&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Shift+F2]</a></li>
                        <li><a href="companyprofilelistpage">Company&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Shift+Ctrl+X]</a></li>
                        <li><a href="customerprofilelistpage">Customer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Shift+Ctrl+R]</a></li>
                        <li><a href="brokerprofilelistpage">Broker&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Shift+Ctrl+U]</a></li>
                        <li><a href="brokercompanylistpage">Broker-Company&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Shift+F10]</a></li>
                        <li><a href="brokercustomerlistpage">Broker-Customer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Shift+F11]</a></li>
                        <li><a href="qualitylistpage">Quality&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Shift+Ctrl+Y]</a></li>
                        <li><a href="deswignlistpage">Design&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Shift+Ctrl+H]</a></li>
                        <li><a href="work_typetlistpage">Work-Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Shift+Ctrl+V]</a></li>
                        </ul>
                        </li>
                        <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-task"></i><span>Profile2</span></a>
		        	   <ul class="dropdown-menu">
                        <li><a href="labourprofilelistpage">Labour&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Shift+Ctrl+I]</a></li>
                        <li><a href="gallerylst">Gallery&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Shift+Ctrl+G]</a></li>
                        <li><a href="contactlistpage">Contact</a></li>
                        <li><a href="statuschange">Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Shift+Ctrl+M]</a></li>
                        <li><a href="takaproductionlist">Taka Production&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Shift+F3]</a></li>
                        <li><a href="saree_pro_listpage">Saree Production&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Shift+F4]</a></li>
                        <li><a href="saree_extrabeam_listpage">Saree-Extra Beam&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Shift+F6]</a></li>
                         <li><a href="sareeexbeamchange">Change-data Saree-Extra Beam<br/>[Shift+F9]</a></li>
                        <li><a href="machinelistpage">Machine&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Shift+Ctrl+J]</a></li>
                        <li><a href="machineusagepartlistpage">Machine-Parts&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Shift+Ctrl+K]</a></li>
                        <li><a href="other_d_c_list">Other Challan Cum Invoice&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[F10]</a></li>
                        <li><a href="otherusedlist">Other-Used&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Shift+F8]</a></li>
                        <li><a href="company_aboutlist">Company-About Us</a></li>
                   </ul>
		        </li>
                 <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-task"></i><span>Reports&nbsp;1</span></a>
		        	   <ul class="dropdown-menu">
			            <li><a href="totalbeamrecords">Beam Challan</a></li>
			            <li><a href="totalbobbinrecords">Bobbin Challan</a></li>
                        <li><a href="totaltakarecords">Taka Challan</a></li>
                        <li><a href="totalsareerecords">Saree Challan</a></li>
                        <li><a href="totalbeaminvoicerecords">Beam Invoice</a></li>
			            <li><a href="totalbobbininvoicerecords">Bobbin Invoice</a></li>
                        <li><a href="totaltakainvoicerecords">Taka Invoice</a></li>
                        <li><a href="totalsareeinvoicerecords">Saree Invoice</a></li>
                        <li><a href="tostockcurrentreport">Stock</a></li>
                        <li><a href="tostockothercurrentreport">Stock-Other</a></li>
                        <li><a href="totalothercumrecords">Other Challan Cum Invoice</a></li>
			           </ul>
		        </li>
                 <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-task"></i><span>Reports&nbsp;2</span></a>
		        	   <ul class="dropdown-menu">
                       <li><a href="totalsalaryrecords">Salary</a></li>
                       <li><a href="totallabourmtrchckrecords">Labour-Meter</a></li>
                      <?php if($row_result['Role']=='Admin' || $row_result['Role']=='Manager')
 { ?>
                         <li><a href="apvalevana">Apvana-Ugharani</a></li>
			            <li><a href="totaltransactionrecord">Transaction</a></li>
                        <li><a href="totalpettyrecords">Expense Entry</a></li>
						<li><a href="totalothercreditrecords">Other-Credit Entry</a></li>
						<li><a href="totaccountsrecords">Financial Statment</a></li><?php } ?>
                        <li><a href="totalbeammachinerecords">Beam-Machine</a></li>
                        <li><a href="totakaprorecords">Taka Production</a></li>
                        <li><a href="tosareeprorecords">Saree Production</a></li>
			            <li><a href="totalmachineprorecord">Machine-Wise Production</a></li>
                         <li><a href="totalmillrecords">Mill-Taka / Saree</a></li>
                         <li><a href="totalmigraterecords">Migration-Taka / Saree</a></li>
                        <li><a href="totalbeabobrecord">Beam / Bobbin Used</a></li>
                        <li><a href="tottaksareerecord">Taka / Saree Sold</a></li>
                        <li><a href="totalcourierrecords">Courier Entry</a></li>
                        <li><a href="totalbiltyrecords">Bilty Entry-Normal</a></li>
                        <li><a href="totalbiltyreturnrecords">Bilty Entry-Return</a></li>
                       <?php if($row_result['Role']=='Admin' || $row_result['Role']=='Manager')
 { ?><li><a href="rojmonth">Yearly Report</a></li><?php } ?>
                       </ul>
		        </li>
                <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-task"></i><span>Order</span></a>
		        	   <ul class="dropdown-menu">
			            <li><a href="taka_order_listpage">Taka&nbsp;&nbsp;[F3]</a></li>
			            <li><a href="order_listpage">Saree&nbsp;&nbsp;[F4]</a></li>
                        </ul>
		        </li>
                <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-task"></i><span>Other</span></a>
		        	   <ul class="dropdown-menu">
                       <?php if($row_result['Role']=='Admin' || $row_result['Role']=='Manager' || $row_result['Role']=='Accountant')
 {
	 ?>
                       <li><a href="banklistpage">Bank</a></li>
			             <li><a href="transaction_listpage?beam">Transaction-Beam&nbsp;&nbsp;[Shift+Tab]</a></li>
                        <li><a href="transaction_listpage?bobbin">Transaction-Bobbin&nbsp;&nbsp;[Shift+Ctrl]</a></li>
                        <li><a href="transaction_listpage?taka">Transaction-Taka&nbsp;&nbsp;[Shift+Enter]</a></li>
                        <li><a href="transaction_listpage?saree">Transaction-Saree&nbsp;&nbsp;[Shift+Home]</a></li>
                        <li><a href="pettylistpage">Expense Entry&nbsp;&nbsp;[Shift+Ctrl+L]</a></li>
                         <li><a href="othercreditlistpage">Other-Credit Entry&nbsp;&nbsp;[Shift+Ctrl+Baki]</a></li>
						<li><a href="financialstatus">Financial Relationship Status</a></li><?php } ?>
			             <li><a href="takaprolabsalist">Taka-Labour&nbsp;&nbsp;[Ctrl+Shift+8]</a></li>
                           <li><a href="sareeprolabsalist">Saree-Labour&nbsp;&nbsp;[Ctrl+Shift+9]</a></li>
                            <li><a href="beammachlistpage">Beam-Machine&nbsp;&nbsp;[Ctrl+Shift+0]</a></li>
                        <li><a href="taka_d_c_milllist">Mill-Taka&nbsp;&nbsp;[Ctrl+Shift+6]</a></li>
                        <li><a href="saree_d_c_milllist">Mill-Saree&nbsp;&nbsp;[Ctrl+Shift+7]</a></li>
                        <li><a href="beam_d_c_migratelist">Migration-Beam&nbsp;&nbsp;[Ctrl+Shift+1]</a></li>
                        <li><a href="bobbin_d_c_migratelist">Migration-Bobbin&nbsp;&nbsp;[Ctrl+Shift+2]</a></li>
                        <li><a href="taka_d_c_migratelist">Migration-Taka&nbsp;&nbsp;[Ctrl+Shift+3]</a></li>
                        <li><a href="saree_d_c_migratelist">Migration-Saree&nbsp;&nbsp;[Ctrl+Shift+4]</a></li>
                        <li><a href="other_d_c_migratelist">Migration-Other&nbsp;&nbsp;[Ctrl+Shift+5]</a></li>
                        <li><a href="stockcurrent">Stock&nbsp;&nbsp;[Ctrl+5]</a></li>
                        <li><a href="stockothercurrentreport">Stock-Other&nbsp;&nbsp;[Ctrl+6]</a></li>
                          <li><a href="biltylistpage">Bilty Entry-Normal</a></li>
                          <li><a href="biltyreturnlistpage">Bilty Entry-Return</a></li>
                       </ul>
		        </li>
                 <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-task"></i><span>Salary</span></a>
		        	   <ul class="dropdown-menu">
			            <li><a href="salarylistpage">Salary-Meter&nbsp;&nbsp;[F1]</a></li>
			            <li><a href="salaryfixedlist">Salary-Fixed&nbsp;&nbsp;[F2]</a></li>
                        </ul>
                </li>
              </ul>
             <?php } ?>
	   </div>
      <div style="min-height:65px;">
      <ul class="nav navbar-nav" style="margin-left:5px;">
 <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><img src="<?php echo $row_result['Photo'];?>" width="40" height="40" style="border-radius:20px;"/>&nbsp;<?php echo $admin;  ?></span></a>
		        	   <ul class="dropdown-menu">
			            <li><?php echo $row_result['Role']; ?></li>
                        <li>Your Code : <?php echo $row_result['Registration_Id']; ?></li>
                        <li><a href="logoutadmin">Logout</a></li>
			            </ul>
		        </li>
                </ul>
</div> 
      </div>
	    <!--/.navbar-collapse-->
</nav>

    