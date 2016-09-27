.ng-datepicker {
	position: absolute;
	z-index: 9999;
	width: 250px;
	background: #fff; 
	font-size: 12px; 
	color: #565a5c; 
	display: inline-block; 
	border: 1px solid #c4c4c4;
	border-radius: 2px;
	margin: 0;
	padding: 0;
}

.ng-datepicker > .controls {
	width: 250px;
	display: inline-block;
	padding: 5px 0 0 0;
}

.ng-datepicker > .controls i {
	font-size: 25px;
	cursor: pointer;
}

.ng-datepicker > .controls > .left {
	width: 35px;
	display: inline-block;
	float: left;
	margin: 5px 0 0 3px;
}

.ng-datepicker > .controls > .left > i.prev-year-btn {
	float: left;
	display: block;
	font-size: 14px;
	opacity: 0.4;
}

.ng-datepicker > .controls > .left > i.prev-month-btn {
	float: left;
	margin: -5px 0 0 9px;
	display: block;
}

.ng-datepicker > .controls > span.date {
	width: 170px;
	text-align: center;
	font-size: 14px;
	color: #565a5c;
	font-weight: bold;
	float: left; 
	padding: 3px 0 0 0;
}

.ng-datepicker > .controls > .right {
	width: 35px;
	display: inline-block;
	float: right;
	margin: 5px 0 0 0;
}

.ng-datepicker > .controls > .right > i.next-year-btn {
	float: left;
	display: block;
	font-size: 14px;
	opacity: 0.4;
}

.ng-datepicker > .controls > .right > i.next-month-btn {
	float: left;
	margin: -6px 9px 0 0;
}

.ng-datepicker > .day-names {
	width: 250px;
	border-bottom: 1px solid #c4c4c4;
	display: inline-block;
}

.ng-datepicker > .day-names > span {
	width: 35.7px;
	text-align: center;
	color: #82888a;
	float: left;
	display: block;
}

.ng-datepicker > .calendar {
	width: 255px;
	display: inline-block;
	margin: -3px 0 -4px -1px;
	padding: 0;
}

.ng-datepicker > .calendar > span > span.day {
	width: 35px;
	height: 35px;
	border-left: 1px solid #c4c4c4;
	border-bottom: 1px solid #c4c4c4;
	float: left;
	display: block;
	color: #565a5c;
	text-align: center;
	font-weight: bold;
	line-height: 35px;
	margin: 0;
	padding: 0;
	font-size: 14px;
	cursor: pointer;
}

.ng-datepicker > .calendar > span:last-child > span.day {
	border-right: 1px solid #c4c4c4;
}

.ng-datepicker > .calendar > span > span.day.disabled {
	border-left: 1px solid transparent;
	cursor: default;
	pointer-events: none;
}

.ng-datepicker > .calendar > span > span.day:hover {
	background: #ff5c5b;
	color: #fff;
}