<!DOCTYPE html>
  <html>
    <head>
      <title>Weather Cast | <?=$title?></title>
      <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <style>
        body {
		
          padding: 4% 2%;
          background-color: #00bcd4; 
          color: #fff;
          font-family: 'Raleway', sans-serif;
        }
        .title {
          border-bottom: .1em solid #fff;
        }
        .title h1 {
          margin-top: 0;
          font-size: 4em;
        }
        .cityinput input {
          border:0;
          border-radius: 6px;
          box-shadow: none;
          font-size: 18px;
          background-color: transparent;
          color: #fff;
          padding: 0;
        }
    
        .cityinput input::-webkit-input-placeholder {
        	color: #f4f4f4;
        }
        .cityinput input.form-control:focus {
        	box-shadow: none;
        }
        .cityinput label {
        	font-size: 24px;
        }
        .listdata {
        	border-bottom: 1px solid #fff;
        	padding: 10px 5px;
        	margin: 0;
        }
        .listdata:last-child {
        	border-bottom: 0;
        }
        .level {
        	position: relative;
        	font-size: 120px;
        	border-right: 1px solid #fff;
        }
        .level #unit {
        	position: absolute;
        	font-size: 30px;
        	bottom: 10px;
        	right: 5px;
        }
        .descript p {
        	margin-bottom: 2px;
        }
        .scrollable-list {
        	overflow-y: scroll;
        	overflow-x: hidden;
        	height: 60vh;
        }
        .weather {
        	border-right:1px solid #fff
        }

        @media screen and (max-width: 767px) {
        	.level {
        		border-right: 0;
        	}
        }
    </style>

    <body>
        <div class="container">
            <div class="row">
	            <div class="col-sm-6" style="padding: 0 25px 0 0">
	                <div class="title">
                		<h1><strong>Current Weather</strong></h1>
	                </div>
	                <h2><?php $current_weather['name']?>, <?php $current_weather['sys']['country']?> | <?php date('d F Y', $current_weather['dt'])?></h2>
	                <div class="row listdata">
		                <div class="col-sm-6 level">
		                	<p><strong><?php substr($current_weather['main']['temp'], 0, 2)?></strong> &deg;</p>
		                	<p id="unit">Celcius</p>
		                </div>
		                <div class="col-sm-6 descript">
		                	<p><strong>Low:</strong> <?php $current_weather['main']['temp_min']?>&deg;</p>
		                	<p><strong>High:</strong> <?php $current_weather['main']['temp_max']?>&deg;</p>
		                	<p><strong>Humidity:</strong> <?php $current_weather['main']['humidity']?>%</p>
		                	<p><strong>Pressure:</strong> <?php $current_weather['main']['pressure']?> hPa</p>
		                	<p><strong>Sunrise:</strong> <?php date('H:i:s', $current_weather['sys']['sunrise']+25200)?></p>
		                	<p><strong>Sunset:</strong> <?php date('H:i:s', $current_weather['sys']['sunset']+25200)?></p>
		                </div>
	                </div>
	                <div class="row listdata">
                		<div class="col-sm-6 cityinput">
							<form method="POST" action="<?php site_url('weacast')?>">
								<label>Change location...</label>
			                	<input type="text" class="form-control" placeholder="Your city's name" name="city"> 
			                </form>
						</div>
		                <div class="col-sm-6 descript">
		                	<p><strong><?php $current_weather['weather'][0]['main']?>, <?php $current_weather['weather'][0]['description']?></strong></p>
		                	<p><strong>Cloudiness:</strong> <?php $current_weather['clouds']['all']?>%</p>
		                	<p><strong>Wind Speed:</strong> <?php $current_weather['wind']['speed']?> m/s</p>
	                	</div>
	                </div>
                </div>
                <div class="col-sm-6" style="padding: 0 0 0 25px">
	                <div class="title">
	                	<h1 class="text-right"><strong>Forecast</strong></h1>
	                </div>
	                <div class="scrollable-list">
	                	<?php foreach($forecast_weather['list'] as $data) { ?>
		                <div class="listdata">
			                <h3><?=date('d F Y', $data['dt'])?></h3>
			                <div class="row">
				                <div class="col-sm-8 descript weather">
					                <p><strong><?php $data['weather'][0]['main']?>, <?php $data['weather'][0]['description']?></strong></p>
				                	<p><strong>Humidity:</strong> <?php $data['humidity']?>%</p>
				                	<p><strong>Pressure:</strong> <?php $data['pressure']?> hPa</p>
				                	<p><strong>Cloudiness:</strong> <?php $data['clouds']?>%</p>
		                			<p><strong>Wind Speed:</strong> <?php $data['speed']?> m/s</p>
			                	</div>
			                	<div class="col-sm-4 descript">
	                				<p><strong>Day:</strong> <?php $data['temp']['day']?>&deg;</p>
				                	<p><strong>Low:</strong> <?php $data['temp']['min']?>&deg;</p>
				                	<p><strong>High:</strong> <?php $data['temp']['max']?>&deg;</p>
	                				<p><strong>Morning:</strong> <?php $data['temp']['morn']?>&deg;</p>
				                	<p><strong>Evening:</strong> <?php $data['temp']['eve']?>&deg;</p>
				                	<p><strong>Night:</strong> <?php $data['temp']['night']?>&deg;</p>
			                	</div>
			                </div>
		                </div>
		                <?php } ?>
		            </div>
                </div>
            </div>
        </div>

    </body>
  </html>