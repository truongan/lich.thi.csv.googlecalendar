<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Page Title</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script>
var ca_to_time = {};
ca_to_time[1] = "7:30";
ca_to_time[2] = "9:30";
ca_to_time[3] = "13:30";
ca_to_time[4] = "15:30";

$(document).ready(function(){

	$("#convert").click(function(){
	var input = $("#input").val();
	lines = input.split("\n");
	//$(lines).each(function(index, value){alert(value);});
	console.log(ca_to_time);
	console.log(lines[0].trim().split("\t"));
	/// 0		1		2		3		4			5		6		7		8
	/// "STT", "MãMH", "Lớp", "Tên MH", "Ngày thi", "Ca", "Phòng", "Số SV", "CBCT"
	
	//			0		1			2			3		4		5			6
	var output="Subject,Start Date,Start Time,End Date,End Time,Description,Location";

	for(i = 1; i < lines.length; i++){
		var cols = lines[i].trim().split("\t");
		cols[4] = cols[4].replace(/-/g, "/");
		var out = {};

		var time = ca_to_time[cols[5]];

		out[0] = "Gác " + cols[1];
		out[1] = cols[4];
		out[2] = time;
		out[3] = cols[4];
		out[4] = time;
		//console.log(cols);
	}

	});

});
</script>
</head>
<body>
<h4>Đổi lịch coi thi từ daa.uit.edu.vn sang dữ liệu csv có thể import vào google calendar </h4>

<div> <textarea cols="100" rows="10" id="input"></textarea> </div>
<button id="convert">Convert</button>
<div> <textarea cols="100" rows="10 id="output"></textarea> </div>
</body>
</html>
