
<div align="left" width="100%">	

	<div align="center" style="padding-bottom: 20px">
		<img src="">
	</div>

	<div align="center" width="95%" style="padding-bottom: 20px">
		<span style="font-size: 18px;font-weight: bold;font-family:Avenir,Helvetica,sans-serif;">Order for: {{date('F\,\\ Y')}}</span>
	</div>

	<div align="left" style="">

		<div align="left" style="font-size: 16px; padding-bottom:5px;font-weight: bold;font-family:Avenir,Helvetica,sans-serif;">
			<span style="text-decoration: underline;">Add Company Name here</span>
			{{--<span style="text-decoration: none"> {{ date_format(new DateTime($report->subscription_start), 'F jS\, Y') }} <span style="font-weight: normal">to</span> {{ date_format(new DateTime($report->subscription_end), 'F jS\, Y') }} ({{date_diff(new DateTime($report->subscription_start) , new DateTime($report->subscription_end))->days}} Days)</span>--}}
		</div>
		
		@foreach($cart as $menu)

			

				<div style="padding-bottom: 5px;padding-top: 5px;page-break-inside: avoid">

					<div  width="95%" >

						<div style="border-style: solid;border-color: #999999;border-width: 3px;">
							
							<table width="100%" class="table" style="font-family:Avenir,Helvetica,sans-serif;padding-top:5px;padding-left:5px;padding-right: 5px">

								<thead align="center">

									<tr align="left" style="font-size: 14px;font-weight: normal;">

										<th style="font-weight: normal"><span style="font-weight: bold">Name: </span>{{$menu->name}}</th>
										<th style="font-weight: normal"><span style="font-weight: bold">Desc: </span>{{$menu->description}}</th>
										
									</tr>

									<tr align="left" style="font-size: 14px;font-weight: normal;">

										<th style="font-weight: normal"><span style="font-weight: bold">Price Per Unit: </span>{{$menu->unit_price}}</th>

										
										
										<th style="font-weight: normal"><span style="font-weight: bold">Quantity: </span>{{$menu->quantity}}</th>

										

	
										<th style="font-weight: bold">Status: <span style="font-weight: normal;color: #4bfa00">Active</span></th>

										

									</tr>

								</thead>

							</table>

								

						</div>

					</div>

				</div>

			

		@endforeach

	</div>

</div>



