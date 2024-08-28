<html>
<head>

</head>
<body style="margin:0;">
	<div class="canvas">
		<table border="0" cellpadding="0" cellspacing="0" width="100%"
			style="table-layout:fixed;background-color:#F9F9F9;" id="bodyTable">
			<tbody>
				<tr>
					<td align="center" valign="top" style="padding-right:10px;padding-left:10px;" id="bodyCell">

						<!-- Email Wrapper Body Open // -->
						<table border="0" cellpadding="0" cellspacing="0" style="max-width:600px;" width="100%"
							class="wrapperBody">
							<tbody>
								
								<tr>
									<td align="center" valign="top">

										<!-- Table Card Open // -->
										<table border="0" cellpadding="0" cellspacing="0"
											style="background-color:#FFFFFF;border-color:#E5E5E5; border-style:solid; border-width:0 1px 1px 1px;"
											width="100%" class="tableCard">

											<tbody>
												
												<tr>
													<!-- Header Top Border // -->
													<td height="3"
														style="background-color:#003CE5;font-size:1px;line-height:3px;"
														class="topBorder">&nbsp;</td>
												</tr>

												<tr>
													<td align="center"><img src="https://airpal.ie/assets/img/logo.png" style="width:150px;padding:10px;" alt=""> </td>
												</tr>

												<tr>
													<td align="center" valign="top"
														style="padding-bottom: 5px; padding-left: 20px; padding-right: 20px;"
														class="mainTitle">
														<!-- Main Title Text // -->
														<h2  align="center" style="color:rgb(0, 176, 67); font-family:'Poppins', Helvetica, Arial, sans-serif; font-size:28px; font-weight:500; font-style:normal; letter-spacing:normal; line-height:36px; text-transform:none;  padding:0; margin:0">
														Congratulations ! 
														</h2> 

													</td>
												</tr>

												<tr>
													<td align="center" valign="top" style="padding: 20px;"
														class="imgHero">
														<!-- Hero Image // -->
														<a href="#" target="_blank" style="text-decoration:none;">
															<img src="https://airpal.ie/assets/img/welcome1.png"
																alt="" border="0"
																style="width:180px; height:auto; display:block;">
														</a>
													</td>
												</tr>
												<tr>
													<td align="center" valign="top"
														style="padding-left:20px;padding-right:20px;"
														class="containtTable ui-sortable">

														<table border="0" cellpadding="0" cellspacing="0" width="100%"
															class="tableTitleDescription" style="">
															<tbody>
																<tr>
																	<td align="center" valign="top"
																		style="padding-bottom: 20px;"
																		class="mediumTitle">
																		<!-- Medium Title Text // -->
																		<p style="color:#555; font-family:'Poppins', Helvetica, Arial, sans-serif; font-size:16px; font-weight:500; font-style:normal; letter-spacing:normal; line-height:26px; text-transform:none;margin: 0; text-align: left;padding-top:20px;">
																			Your appointment has been successfully scheduled. <br> Please review your booking details below. 
																		</p>
																	</td>
																</tr>

																<tr>
																	<td align="center" valign="top"
																		style="padding-bottom: 20px;"
																		class="description">
																		<table style="width: 100%;">
																			<tr>
																				<td style="padding-bottom: 10px;" width="40%"> 
																					 <p style="font-weight:bold;font-family: 'Poppins';margin: 0;
																					 font-size: 16px;
																					 text-align: left;
																					 line-height: 25px;color:#555;">Appointment with </p>
																				</td>
																				<td style="padding-bottom: 10px;" width="60%">
																					<p style="    font-family: 'Poppins';margin: 0;
																					font-size: 16px;
																					text-align: left;
																					line-height: 25px;">  Dr. {{$BookingDetails->user->fullName}} </p>
																				</td>
																			</tr>
																			<tr>
																				<td style="padding-bottom: 10px;" width="40%"> 
																					 <p style="font-weight:bold;font-family: 'Poppins';margin: 0;
																					 font-size: 16px;
																					 text-align: left;
																					 line-height: 25px;color:#555;">Date </p>
																				</td>
																				<td style="padding-bottom: 10px;" width="60%">
																					<p style="font-family: 'Poppins';margin: 0;
																					font-size: 16px;
																					text-align: left;
																					line-height: 25px;"> {{ $BookingDetails['booking_date']}} </p>
																				</td>
																			</tr>
																			<tr>
																				<td style="padding-bottom: 10px;" width="40%"> 
																					 <p style="font-weight:bold;font-family: 'Poppins';margin: 0;
																					 font-size: 16px;
																					 text-align: left;
																					 line-height: 25px;color:#555;">Time </p>
																				</td>
																				<td style="padding-bottom: 10px;" width="60%">
																					<p style="font-family: 'Poppins';margin: 0;
																					font-size: 16px;
																					text-align: left;
																					line-height: 25px;">{{ $BookingDetails['slot_start_time']}} - {{ $BookingDetails['slot_end_time']}}</p>
																				</td>
																			</tr>
																		</table>
																		</td>
																</tr>
																<tr>
																	<td> 
																		<p style="margin: 0 4px;color:#555; font-family:poppins; font-size:16px; font-weight:500; font-style:normal; letter-spacing:normal; text-transform:none;">
																			Best regards, 
																		</p> 
																		<p style="color:#555; font-family:poppins; font-size:16px; font-weight:400; font-style:normal; letter-spacing:normal; text-transform:none;margin: 0 4px;margin-bottom: 20px;">
																			Team Airpal
																		</p>
																	</td>
																</tr>
																<td align="center" valign="top" style="padding: 10px 10px;background:#eee;">
																	<!-- Information of NewsLetter (Subscribe Info)// -->
																	<p class="text" style="color:#000; font-family:'Poppins', Helvetica, Arial, sans-serif; font-size:12px; font-weight:400; font-style:normal; letter-spacing:normal; line-height:20px; text-transform:none;  padding:0; margin:0;">
																	  For any inquiry and support please contact us on 
																	<a href="mailto:david@airpal.ie"> david@airpal.ie</a>
																	</p>
																</td>


															</tbody>
														</table>




													</td>
												</tr>

												<tr>
													<td height="20" style="font-size:1px;line-height:1px;">&nbsp;</td>
												</tr>

											</tbody>
										</table>
										<!-- Table Card Close// -->

										<!-- Space -->
										<table border="0" cellpadding="0" cellspacing="0" width="100%" class="space">
											<tbody>
												<tr>
													<td height="30" style="font-size:1px;line-height:1px;">&nbsp;</td>
												</tr>
											</tbody>
										</table>

									</td>
								</tr>
							</tbody>
						</table>
						<!-- Email Wrapper Body Close // -->


					</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>

</html>