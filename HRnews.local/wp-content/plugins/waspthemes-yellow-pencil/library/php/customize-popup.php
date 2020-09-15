<?php
/**
 * Customize Popup Page
 *
 * @author 		WaspThemes
 * @category 	Template
 * @version     1.0
 */

// Don't run this file directly.
if (!defined('ABSPATH')) {
	   die('-1');
}


if(get_option("show_on_front") == "page"){

	$frontpage_id = get_option('page_on_front');
	$blogpage_id = get_option('page_for_posts');
	
}else{

	$frontpage_id = 0;
	$blogpage_id = 0;

}


?><!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="robots" content="noindex">
	<meta name="google" value="notranslate">
	<title>Customizing Type Iframe</title>
	<style>
	/* http://meyerweb.com/eric/tools/css/reset/ 
	   v2.0 | 20110126
	   License: none (public domain)
	*/

	html, body, div, span, applet, object, iframe,
	h1, h2, h3, h4, h5, h6, p, blockquote, pre,
	a, abbr, acronym, address, big, cite, code,
	del, dfn, em, img, ins, kbd, q, s, samp,
	small, strike, strong, sub, sup, tt, var,
	b, u, i, center,
	dl, dt, dd, ol, ul, li,
	fieldset, form, label, legend,
	table, caption, tbody, tfoot, thead, tr, th, td,
	article, aside, canvas, details, embed, 
	figure, figcaption, footer, header, hgroup, 
	menu, nav, output, ruby, section, summary,
	time, mark, audio, video {
		margin: 0;
		padding: 0;
		border: 0;
		font-size: 100%;
		font: inherit;
		vertical-align: baseline;
	}
	/* HTML5 display-role reset for older browsers */
	article, aside, details, figcaption, figure, 
	footer, header, hgroup, menu, nav, section {
		display: block;
	}
	body {
		line-height: 1;
	}
	ol, ul {
		list-style: none;
	}
	blockquote, q {
		quotes: none;
	}
	blockquote:before, blockquote:after,
	q:before, q:after {
		content: '';
		content: none;
	}
	table {
		border-collapse: collapse;
		border-spacing: 0;
	}

	*:not(input):not(textarea){
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}

	*,*:hover,*:active,*:focus{
		outline:none;
	}

	*{
		-webkit-box-sizing:border-box;
		box-sizing:border-box;
	}

	body{
		font-family: -apple-system, BlinkMacSystemFont, 'Helvetica Neue', Helvetica, Arial, sans-serif;
	    color:#767676;
	}

	.yp-new-edit-popup{
	    width:620px;
	    background-color:#FFFFFF;
	    -webkit-box-shadow: 0px 0px 4px 1px rgba(0, 0, 0, 0.14);
	    box-shadow: 0px 0px 4px 1px rgba(0, 0, 0, 0.14);
	    position:fixed;
	    top:50%;
	    left:50%;
	    margin-left:-310px;
	    margin-top:-240px;
	    z-index:2147483646;
	    overflow:hidden;
	    border-radius: 4px;
		padding:30px 40px;

		line-height:1.4;
		display:block;
	}

	.yp-new-edit-popup-background{
	    width:100%;
	    height:100%;
	    position:fixed;
	    top:0%;
	    left:0%;
	    z-index:2147483645;
	    display:block;
	    cursor: -webkit-zoom-out;
	    cursor: zoom-out;
	}

	.yp-new-edit-popup h3{
		font-weight:400;
		color:#686868;
		margin-top:0px;
		margin-bottom:30px;
		padding-bottom:10px;
		text-transform:capitalize;
		text-align:center;
		font-size:18px;
		width:80%;
		margin-left:auto;
		margin-right:auto;
		border-bottom:1px solid #DDD;
	}

	.new-edit-footer{
		text-align:right;
	}

	.new-edit-btn{
		padding:10px 16px;
		font-size:13px;
		font-weight:600;
		border-radius:2px;
		cursor:pointer;
		opacity:0.92;

		display:inline-block;
	}

	.new-edit-btn:hover{
		opacity:1;
	}

	.new-edit-cancel{
		background-color: #767676;
		color:#FFF;
		margin-right:10px;
	}

	.new-edit-continue{
		background-color: #419BF9;
		color: #ffffff;
	}

	.customize-type-radio-section{
		padding-bottom:40px;
	}

	.customize-type-radio{
		float: left;
		width: 140px;
		text-align: center;
		position:relative;
		cursor:pointer;
		margin-left:20px;
		margin-right:20px;
	}

	.customize-type-radio p{
		color:#767676;
		font-size:11px;
		font-weight:400;
		margin:0;
		margin-top:6px;
	}

	.clearfix{
		clear:both;
	}

	.select-radio{
		border:2px solid #ADADAD;
		width:20px;
		height:20px;
		position:absolute;
		top:0;
		left:0px;
		border-radius:50%;
	}

	.type-center .select-radio{
		left:30px;
	}

	.select-radio i{
		width:10px;
		height:10px;
		margin-top:-5px;
		margin-left:-5px;
		background-color:#ADADAD;
		position:absolute;
		top:50%;
		left:50%;
		display:none;
		border-radius:50%;
	}

	.customize-type-radio:active .select-radio i,.customize-type-radio.active .select-radio i{
		display:inline-block;
	}

	.customize-type-radio.active .select-radio{
		border-color:#419BF9;
	}

	.customize-type-radio.active .select-radio i{
		background-color:#419BF9;
	}

	.customize-type-radio h4{
		margin:0px;
		font-weight:600;
		font-size: 13px;
		padding-left: 30px;
		text-align: left;
		padding-top:1px;
	}

	.customize-type-icon{
		width:64px;
		height:64px;
		background-size:100% 100%;
		display:inline-block;

		-webkit-filter:grayscale(1);
		-moz-filter:grayscale(1);
		filter:grayscale(1);

		margin-top: 20px;
		opacity:0.9;
	}

	.customize-type-radio.active{
		color:#585858;
	}

	.customize-type-radio.active .customize-type-icon{
		-webkit-filter:grayscale(0);
		-moz-filter:grayscale(0);
		filter:grayscale(0);
	}

	.customize-single-icon{
		background-image:url("data:image/svg+xml,%3Csvg enable-background='new 0 0 64 64' version='1.1' viewBox='0 0 64 64' xml:space='preserve' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' stroke='%23419BF9' stroke-miterlimit='10' stroke-width='3'%3E%3Cg stroke-linejoin='round'%3E%3Cline x1='15.341' x2='47.748' y1='26.542' y2='26.542'/%3E%3Cline x1='15.341' x2='47.748' y1='36.251' y2='36.251'/%3E%3Cline x1='15.341' x2='47.748' y1='45.959' y2='45.959'/%3E%3C/g%3E%3Cpolygon points='43.437 1.5 7.218 1.5 7.218 62.5 56.781 62.5 56.781 15.083 43.676 1.5'/%3E%3Cpolyline points='56.781 15.083 43.437 15.083 43.437 1.5'/%3E%3C/g%3E%3C/svg%3E%0A");
	}

	.customize-template-icon{
		background-image: url("data:image/svg+xml,%3Csvg width='128pt' height='128pt' version='1.1' viewBox='0 0 128 128' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23419bf9'%3E%3Cpath d='m21.41 0h70.58c8.67 8.73 16.92 17.87 25.57 26.63 0.04 30.44-0.02 60.87 0.03 91.31-3.34 0.05-6.67 0.02-10.01 0.05-0.02 3.33 0 6.67-0.02 10.01h-96.15c-0.06-39.3 0.07-78.59-0.07-117.89 3.35-0.15 6.7-0.06 10.05-0.1 0.01-3.33 0-6.67 0.02-10.01m5.31 5.61c0.05 35.59 0.05 71.19 0 106.78 28.51 0.14 57.03 0.12 85.54 0.01-0.05-27.27-0.03-54.53-0.01-81.8-8.2-0.24-16.41 0.08-24.6-0.16 0.17-8.26-0.1-16.52 0.15-24.78-20.35-0.25-40.73-0.15-61.08-0.05m66.56 3.63c-0.12 5.23-0.04 10.46-0.05 15.69 4.92 0.37 9.88 0.09 14.82 0.14-4.53-5.6-9.9-10.51-14.77-15.83m-76.56 6.37c0.05 35.59 0.05 71.19 0 106.78 28.51 0.14 57.02 0.12 85.53 0.01-0.01-1.4 0-2.81 0.02-4.21-26.95-0.54-53.93-0.02-80.9-0.26 0.06-34.13 0.01-68.27 0.03-102.41-1.56 0-3.12 0.03-4.68 0.09z'/%3E%3Cpath d='m39.21 46.15c19.72 0.07 39.44-0.05 59.17 0.07-0.02 1.77 0 3.54 0.05 5.31-19.76 0.32-39.53 0.08-59.29 0.12 0-1.83 0.02-3.67 0.07-5.5z'/%3E%3Cpath d='m39.17 64.22c19.28 0.02 38.55-0.03 57.82 0.02 0.37 0.06 1.11 0.19 1.48 0.25-0.09 1.67-0.12 3.35-0.08 5.03-19.73 0.14-39.46-0.01-59.2 0.07-0.03-1.79-0.06-3.58-0.02-5.37z'/%3E%3Cpath d='m39.21 81.96c19.73 0.04 39.48-0.23 59.19 0.22-0.02 1.76-0.03 3.53-0.02 5.3-19.71 0.14-39.43-0.03-59.14 0.09-0.13-1.87-0.08-3.74-0.03-5.61z'/%3E%3C/g%3E%3C/svg%3E%0A");
	}

	.customize-global-icon{
		background-image:url("data:image/svg+xml,%3Csvg enable-background='new 0 0 64 64' version='1.1' viewBox='0 0 64 64' xml:space='preserve' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' stroke='%23419BF9' stroke-linecap='round' stroke-linejoin='round' stroke-miterlimit='10' stroke-width='3'%3E%3Cpath d='m14.14 7.465'/%3E%3Ccircle cx='31.988' cy='32.02' r='29.98'/%3E%3Cline x1='32.013' x2='32.013' y1='2' y2='61.96'/%3E%3Cline x1='2.032' x2='61.992' y1='31.979' y2='31.979'/%3E%3Cpath d='m32.013 46.423'/%3E%3Cpath d='m32.013 2'/%3E%3Cpath d='m32.013 61.96'/%3E%3Cpath d='m32.013 2'/%3E%3Cpath d='m32.013 61.96'/%3E%3Cellipse cx='31.848' cy='32.021' rx='18.13' ry='29.979'/%3E%3Cpath d='m12.593 9.515c0 2.749 8.683 7.787 19.396 7.787 10.712 0 19.393-5.04 19.393-7.787'/%3E%3Cpath d='m12.593 54.775c0-2.748 8.683-7.787 19.396-7.787 10.712 0 19.393 5.041 19.393 7.787'/%3E%3C/g%3E%3C/svg%3E%0A");
	}

	.type-first{
		margin-left:0px;
		margin-right:30px;
	}

	.type-last{
		margin-left:30px;
		margin-right:0px;
	}

	.type-center{
		border-left: 1px dotted #E6E6E6;
		border-right: 1px dotted #E6E6E6;
		padding-left: 30px;
		padding-right: 30px;
		margin-left: 0px;
		margin-right: 0px;
		width: 200px;
	}

	.customize-type-page-section{
		width:80%;
		position:relative;
		padding-bottom:10px;
		margin-left:auto;
		margin-right:auto;
		font-size:0;
		height: 42px;
	}

	.customize-type-page-section::after {
		content: "";
		display: block;
		width: 24px;
		height: 24px;
		background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='20' viewBox='0 0 24 20'%3E%3Cpath d='M20,192,8,204l-4-4-4,4,8,8,16-16Z' transform='translate(0 -192)' fill='%2353B559'/%3E%3C/svg%3E");
		position: absolute;
		top: 18px;
		right: -30px;
		z-index: 50;
		background-size: 16px;
		background-repeat: no-repeat;
		background-position: center;
		opacity: 0.9;
		margin-top: -12px;
	}

	.yp-new-edit-popup.invalid-url .customize-type-page-section::after{
		display:none;
	}

	.yp-new-edit-popup.invalid-url .new-edit-continue{
		opacity: 0.8;
		pointer-events: none;
	}

	.customize-type-checkbox-section label{
		font-weight: 600;
		font-size: 11px;
		cursor: pointer;
		position: relative;
		top: -6px;
		padding-left: 8px;
		left: -4px;
	}

	.customize-type-checkbox-section{
		padding-bottom:30px;
		width:80%;
		margin-left:auto;
		margin-right:auto;
		padding-top:6px;
	}

	.customize-type-select{
		border: 2px solid #ADADAD;
		padding: 8px 10px;
		border-radius: 4px;
		cursor: pointer;
		font-size: 12px;
		font-weight: 600;
		color: #767676;

		z-index: 13;
		position: relative;
		background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='5'%3E%3Cpath d='M4,0,8,5H0Z' transform='translate(8 5) rotate(180)' fill='%23898989'/%3E%3C/svg%3E");
		background-repeat:no-repeat;
		background-position: 97% center;
		background-color:#FFF;

		display:inline-block;
		width:calc(100% - 42px);
		height: 36px;
		line-height: 1.5;
		overflow-y: hidden;
		overflow-x: auto;
	}

	.customize-type-select > span:not(.customize-special-url) {
	    width: 95%;
	    display: inline-block;
	    overflow: hidden;
	    white-space: nowrap;
	    -o-text-overflow: ellipsis;
	       text-overflow: ellipsis;
	}

	.customize-type-select:hover,.customize-type-select.active{
		border-color:#A4A4A4;
	}

	.customize-type-select.active{
		background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='5'%3E%3Cpath d='M4,0,8,5H0Z' fill='%23898989'/%3E%3C/svg%3E");
	}

	.customize-type-select-list{
		position: absolute;
		background-color: #FFFFFF;
		padding: 10px 0px;
		border-radius: 0 0 3px 3px;
		width: calc(98% - 42px);
		-webkit-box-shadow: 0px 0px 3px 0px rgba(0,0,0,0.6);
		box-shadow: 0px 0px 3px 0px rgba(0,0,0,0.6);
		margin-left: 1%;
		max-height: 280px;
		overflow-y: auto;
		z-index: 11;
		display:none;
		margin-top: -2px;
	}

	.customize-type-select-list ul,.customize-type-select-list li{
		margin:0;
		padding:0;
		list-style:none;
	}

	.customize-type-select-list li{
		padding:8px 12px;
		font-size:12px;
		position:relative;
	}

	.customize-type-select-list li:not(.parent-select-list):not(.active):hover{
		background-color:rgba(0,0,0,0.08);
		color: #777777;
	}

	.type-select-placeholder{
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0;
		left: 0;
		background-color:rgba(0,0,0,0.01);
		z-index:9;
		display:none;
	}

	#choose-page-type{
		position: relative;
		z-index: 20;
		pointer-events:none;
	}

	.checkbox-radio{
		border:2px solid #ADADAD;
		width:20px;
		height:20px;
		top:0;
		left:0px;
		border-radius:3px;
		display:inline-block;
		cursor:pointer;
		position:relative;
	}

	.checkbox-radio i{
		width:10px;
		height:10px;
		margin-top:-5px;
		margin-left:-5px;
		background-color:#ADADAD;
		position:absolute;
		top:50%;
		left:50%;
		display:none;
		border-radius:3px;
	}

	.checkbox-radio i{
		display:inline-block;
	}

	.checkbox-radio.active{
		border-color:#419BF9;
	}

	.checkbox-radio.active i{
		background-color:#419BF9;
	}

	.customize-special-url{
		width: 36px;
		height: 35px;
		cursor: pointer;
		display: inline-block;
		z-index: 8;
		background-color: #CBCBCB;
		border-radius: 3px;
		font-size: 10px;
		text-align: center;
		line-height: 33px;
		font-weight: 400;
		letter-spacing: 1px;
		color:#565656;
		margin-left: 6px;
		vertical-align:top;
		font-family: inherit;
	}

	.customize-special-url:hover,.customize-special-url.active{
		-webkit-box-shadow: 0px 0px 8px 4px rgba(0,0,0,0.08) inset;
		        box-shadow: 0px 0px 8px 4px rgba(0,0,0,0.08) inset;
	}

	.customize-special-url.active{
		background-color:#419BF9;
		color:#FFF;
	}

	.customize-url-input{
		border: 2px solid #ADADAD;
		padding: 8px 10px;
		border-radius: 4px;
		font-size: 12px;
		font-weight: 600;
		color: #777;

		z-index: 13;
		position: relative;
		background-color:#FFF;

		display:none;
		width:calc(100% - 42px);
		height: 36px;
		line-height: 1.5;
	}

	.customize-url-input:focus,.customize-url-input.active{
		border-color:#A4A4A4;
	}

	.customize-type-select-list li.active{
	    background-color: rgba(65, 155, 249, 0.9);
		color: #FFFFFF;
	}

	.customize-type-select-list li.parent-select-list {
	    font-weight: 600;
	    cursor: default !important;
	    border-bottom: 1px solid rgba(0,0,0,0.1);
	}

	.customize-type-select-list li:not(.parent-select-list) {
	    padding-left: 16px;
	}

	.customize-type-radio.disabled {
	    pointer-events: none;
	    opacity: 0.7;
	}

	.yp-exit-confirm-box{
		position: fixed;
		top: 44%;
		left: 50%;
		z-index: 2147483647;
		width: 460px;
		margin-top:-67px;
		margin-left: -230px;
		padding: 30px 0px 28px;

		background: #F6F6F6;
		color:#555555;
		line-height: 1.4;
		border-radius: 4px;

		-webkit-box-shadow:0px 0px 4px 1px rgba(0, 0, 0, 0.14);
		box-shadow:0px 0px 4px 1px rgba(0, 0, 0, 0.14);

		text-align:center;
		display:none;
		height: 134px;
	}

	.yp-exit-confirm-box h3{
		font-weight: 400;
		color: #585858;
		margin-top: 0px;
		padding-bottom: 0px;
		margin-bottom:19px;
		text-align: center;
		font-size: 19px;
		margin-left: auto;
		margin-right: auto;
	}

	.yp-exit-confirm-box .action-btn{
		padding: 7px 12px;
		font-size: 12px;
		font-weight: 600;
		border-radius: 2px;
		cursor: pointer;
		opacity: 0.92;
		display: inline-block;
		background-color: #767676;
		color: #FFF;
		margin-left: 3px;
		margin-right: 3px;
	}

	.yp-exit-confirm-box .primary-btn{
		background-color: #419BF9;
    	color: #ffffff;
	}

	.action-btn:hover{
		opacity:1;
	}

	.yp-exit-confirm-bg{
		width:100%;
	    height:100%;
	    background-color:#000;
	    position:fixed;
	    top:0%;
	    left:0%;
	    z-index:2147483646;
	    opacity:0.5;
	    display:none;
	    cursor:-webkit-zoom-out;
	    cursor:zoom-out;
	}

	.action-btn.disabled{
		pointer-events: none;
	    opacity: 0.7;
	}

	li.has-style:after{
		position: absolute;
		content: "Edited";
		border-radius: 4px;
		background-color: rgba(0, 0, 0, 0.09);
		right: 38px;
		top: 50%;
		margin-top: -7px;
		margin-left: -19px;
		font-size: 11px;
		text-align: center;
		padding: 2px 6px;
	}

	li:not(.active).has-style:after{
		color:#5C5C5C;
	}

	li i{
		background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='11' viewBox='0 0 16 11'%3E%3Cg transform='translate(1.025)' opacity='0.9'%3E%3Cpath d='M8.414,4a1.5,1.5,0,1,0,1.5,1.5A1.5,1.5,0,0,0,8.414,4Z' transform='translate(-1.419 0.055)'/%3E%3Cpath d='M7.992,0A9.142,9.142,0,0,0,.18,5.047L.05,5.284a.525.525,0,0,0,.008.467l.137.231C2,9.03,5.062,11,7.992,11s5.826-1.841,7.782-4.923l.157-.248a.513.513,0,0,0,.005-.5l-.154-.25C13.808,1.852,10.968,0,7.992,0Zm.014,9.167A3.631,3.631,0,0,1,4.413,5.5a3.594,3.594,0,1,1,7.186,0A3.63,3.63,0,0,1,8.007,9.167Z' transform='translate(-1.025 0)'/%3E%3C/g%3E%3C/svg%3E");
		width: 16px;
		height: 16px;
		position: absolute;
		right: 12px;
		background-repeat: no-repeat;
		background-position: center;
		cursor: pointer;
		top: 50%;
		margin-top:-8px;
		opacity:0;
		pointer-events:none;
		background-size:13px 13px;
	}

	li span{
		width: 75%;
		display: inline-block;
	}

	li.active i{
		background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='11' viewBox='0 0 16 11'%3E%3Cg transform='translate(1.025)' opacity='0.9' fill='%23FFFFFF'%3E%3Cpath d='M8.414,4a1.5,1.5,0,1,0,1.5,1.5A1.5,1.5,0,0,0,8.414,4Z' transform='translate(-1.419 0.055)'/%3E%3Cpath d='M7.992,0A9.142,9.142,0,0,0,.18,5.047L.05,5.284a.525.525,0,0,0,.008.467l.137.231C2,9.03,5.062,11,7.992,11s5.826-1.841,7.782-4.923l.157-.248a.513.513,0,0,0,.005-.5l-.154-.25C13.808,1.852,10.968,0,7.992,0Zm.014,9.167A3.631,3.631,0,0,1,4.413,5.5a3.594,3.594,0,1,1,7.186,0A3.63,3.63,0,0,1,8.007,9.167Z' transform='translate(-1.025 0)'/%3E%3C/g%3E%3C/svg%3E");
	}

	li i{
		opacity:0.35;
		pointer-events:auto;
	}

	li.active i{
		opacity:0.8;
	}

	li i:hover{
		opacity:0.6;
	}

	li.active i:hover{
		opacity:1;
	}

	li.active.has-style:after{
		background-color: rgba(0, 0, 0, 0.09);
	}

	.customize-type-radio:after{
		content: attr(data-rule);
		font-size: 11px;
		background-color: #757575;
		position: absolute;
		top: 2px;
		padding: 1px 4px;
		border-radius: 3px;
		color: #FFF;
		opacity:0.8;
	}

	.customize-type-radio:after:empty{
		display:none !important;
	}

	.customize-type-radio.disabled:after{
		display:none !important;
	}

	.customize-type-radio.active:after{
		background-color: #419BF9;
	}

	.customize-type-radio.type-first:after{
		left:77px;
	}

	.customize-type-radio.type-center:after{
		left:125px;
	}

	.customize-type-radio.type-last:after{
		left:78px;
	}

	.customize-type-select-list li strong{
		background-color: rgba(0, 0, 0, 0.09);
		padding: 2px 6px;
		margin-left: 6px;
		border-radius: 4px;
		font-size: 11px;
		font-weight: 400;
	}

	.customize-type-select-list li:not(.active) strong{
		color:#5C5C5C;
	}

	.customize-type-select span strong{
		display:none;
	}
	</style>

	<script>


		function typeClick(element){

			var types = document.getElementsByClassName("customize-type-radio");

			var type = element.getAttribute("data-value");

			Array.prototype.forEach.call(types ,function(entry){
				entry.classList.remove("active");
			});

			element.classList.add("active");
			element.classList.add("actived-by-user");

			formChange();

		}

		function closeSelect(){

			var select = document.getElementsByClassName("customize-type-select")[0];
			var menu = document.getElementsByClassName("customize-type-select-list")[0];
			var holder = document.getElementsByClassName("type-select-placeholder")[0];

			select.classList.remove("active");
			menu.style.display = 'none';
			holder.style.display = 'none';

		}

		function pageChoose(element){

			// Get menu
			var menu = document.getElementsByClassName("customize-type-select-list")[0];
			var holder = document.getElementsByClassName("type-select-placeholder")[0];

			if(menu.style.display == 'block'){

				element.classList.remove("active");
				menu.style.display = 'none';
				holder.style.display = 'none';

			}else{

				element.classList.add("active");
				menu.style.display = 'block';
				holder.style.display = 'block';

			}

		}

		function seePageLink(element){

			// Get Page URL
			var pageURL = decodeURIComponent(element.parentElement.getAttribute("data-type-href")).trim();
			pageURL = location.protocol + "//" + pageURL;

			// Open Tab
			var newTab = window.open(pageURL, '_blank');
  			newTab.focus();
			
			// disable list click
			var list = document.querySelectorAll("li");
			for(var i = 0; i < list.length; i++){
				document.querySelectorAll("li")[i].classList.add("no-click");
			}

			return false;

		}
	

		function typeListSelect(element){

			// Getting ID
			var id = element.getAttribute("data-id-value");

			// Disable list click on see page link
			if(element.classList.contains("no-click") == true){

				var list = document.querySelectorAll("li");

				for(var i = 0; i < list.length; i++){
					document.querySelectorAll("li")[i].classList.remove("no-click");
				}

				return false;

			}

			// Enable All
			var types = document.querySelectorAll(".customize-type-radio");

			for(var x = 0; x < types.length; x++){
			    types[x].classList.remove("disabled");
			}

			// Get frontpage ID
			var frontPage = "<?php echo $frontpage_id; ?>";
			var blogPage = "<?php echo $blogpage_id; ?>";

			// Disable Single on these methods
			if(id == 'search' || id == 'tag' || id == 'category' || id == 'archive' || id == 'author' || id == '404' || id == '0'){

				// Disable single
				document.querySelectorAll(".customize-type-radio.type-first")[0].classList.add("disabled");

				// if single were active, so active template
				if(document.querySelectorAll(".customize-type-radio.type-first.disabled.active").length > 0){

					document.querySelectorAll(".customize-type-radio.type-first.disabled.active")[0].classList.remove("active");
					document.querySelectorAll(".customize-type-radio:not(.type-first):not(.type-last)")[0].classList.add("active");

				}

			}


			// Disable template on these methods
			if(id == 'home' || id == frontPage || id == blogPage || id == "login" || id == "register" || id == "lostpassword"){
				
				// Disable template
				document.querySelectorAll(".customize-type-radio:not(.type-first):not(.type-last)")[0].classList.add("disabled");

				// if template were active, so active single
				if(document.querySelectorAll(".customize-type-radio:not(.type-first):not(.type-last).disabled.active").length > 0){

					document.querySelectorAll(".customize-type-radio:not(.type-first):not(.type-last).disabled.active")[0].classList.remove("active");
					document.querySelectorAll(".customize-type-radio.type-first")[0].classList.add("active");

				}

			}

			// Disable Global on these methods
			if(id == "login" || id == "register" || id == "lostpassword"){

				// Disable others and enable single
				document.querySelectorAll(".customize-type-radio.type-last")[0].classList.add("disabled");
				document.querySelectorAll(".customize-type-radio.active")[0].classList.remove("active");
				document.querySelectorAll(".customize-type-radio.type-first")[0].classList.add("active");

			}

			// Is post or page.
			if(/^\d+$/.test(id) && id != 404){

				// if template were active, so active single
				if(document.querySelectorAll(".customize-type-radio:not(.type-first):not(.type-last).active:not(.actived-by-user)").length > 0){
					document.querySelectorAll(".customize-type-radio:not(.type-first):not(.type-last)")[0].classList.remove("active");
					document.querySelectorAll(".customize-type-radio.type-first")[0].classList.add("active");
				}

			}

			var findActive = document.querySelectorAll(".customize-type-select-list li.active");

			if(findActive.length > 0){
				findActive[0].classList.remove("active");
			}

			element.classList.add("active");

			var select = document.getElementsByClassName("customize-type-select")[0];

			select.innerHTML = element.innerHTML;

			closeSelect();

			formChange();

			// Data Rule
			document.querySelectorAll(".customize-type-radio.type-first")[0].setAttribute("data-rule", "Empty");
			document.querySelectorAll(".customize-type-radio.type-center")[0].setAttribute("data-rule", "Empty");

			// Add edited to single if true
			if(element.getAttribute("data-single") > 0){
				document.querySelectorAll(".customize-type-radio.type-first")[0].setAttribute("data-rule", element.getAttribute("data-single") + " Rule");
			}

			// Add edited to template if true
			if(element.getAttribute("data-template") > 0){
				document.querySelectorAll(".customize-type-radio.type-center")[0].setAttribute("data-rule", element.getAttribute("data-template") + " Rule");
			}

		}

		function typeCheckbox(type){

			// URLs
			var checkbox = document.getElementsByClassName("customize-visitor-view")[0];
		
			// IS active
			if(checkbox.classList.contains("active")){
				checkbox.classList.remove("active");
			}else{
				checkbox.classList.add("active");
			}

			formChange();

		}

		function typeToggleURL(element){

			var urlInput = document.getElementsByClassName("customize-url-input")[0];
			var selectPage = document.getElementsByClassName("customize-type-select")[0];

			// IS active
			if(element.classList.contains("active")){
				element.classList.remove("active");
				urlInput.style.display = 'none';
				selectPage.style.display = 'inline-block';
				document.getElementsByClassName("yp-new-edit-popup")[0].classList.remove("invalid-url");
			}else{
				element.classList.add("active");
				urlInput.style.display = 'inline-block';
				selectPage.style.display = 'none';
			}

			// Set current href
			urlInput.value = decodeURIComponent(document.querySelectorAll('.customize-type-select-list li.active')[0].getAttribute("data-type-href"));

			formChange();

		}

		function customURL(element){

			if(document.querySelectorAll(".customize-special-url.active").length > 0){

				// Get URL
				pageHref = document.getElementsByClassName("customize-url-input")[0].value.trim();

				// trim http
				if(pageHref.indexOf("://") != -1 && pageHref.length > 11){
					pageHref = pageHref.split("://")[1];
					document.getElementsByClassName("customize-url-input")[0].value = pageHref;
				}
				
				// Test URL
				if(/(\b \b|\.$|^\.)/g.test(pageHref) || pageHref.indexOf(".") == -1 || pageHref.length < 4 || pageHref.indexOf(window.location.hostname) == -1){
					document.getElementsByClassName("yp-new-edit-popup")[0].classList.add("invalid-url");
				}else{
					document.getElementsByClassName("yp-new-edit-popup")[0].classList.remove("invalid-url");
				}

				// enCode
				pageHref = encodeURIComponent(pageHref);

				// Li Href
				var liHref = document.querySelectorAll('.customize-type-select-list li[data-type-href="'+pageHref+'"]');

				var single = document.querySelectorAll(".customize-type-radio.type-first")[0];
				var template = document.querySelectorAll(".customize-type-radio:not(.type-first):not(.type-last)")[0];
				var global = document.querySelectorAll(".customize-type-radio.type-last")[0];

				// find info by href
				if(liHref.length == 0){

					single.classList.add("disabled");
					single.classList.remove("active");

					template.classList.add("disabled");
					template.classList.remove("active");

					global.classList.remove("disabled");
					global.classList.add("active");

				}else{

					single.classList.remove("disabled");
					template.classList.remove("disabled");
					global.classList.remove("disabled");

					typeListSelect(liHref[0]);

				}

			}

			formChange();

		}

		function newTypeContinue(){

			// update URL too
	        if (window.parent.history.pushState){
	            if(window.parent.location.href.split("&yp_load_popup=").length > 0){
					window.parent.history.pushState(null, null, window.parent.location.href.split("&yp_load_popup=")[0]);
	        	}
	    	}

			// Don't ask on demo mode
			if (window.parent.document.body.classList.contains('yp-yellow-pencil-demo-mode') == false) {

				if(window.parent.document.querySelectorAll(".yp-save-btn.waiting-for-save").length > 0 && document.querySelectorAll(".new-edit-btn.only-continue-btn").length == 0){

					// Show
					document.getElementsByClassName("yp-exit-confirm-box")[0].style.display = 'block';
					document.getElementsByClassName("yp-exit-confirm-bg")[0].style.display = 'block';

					return false;

				}
			}

			var parentIframe = window.parent.document.getElementById("yp-customizing-type-frame");
			parentIframe.style.display = 'none';

			// var this mode
			var editMode = document.querySelectorAll(".customize-type-radio.active")[0].getAttribute("data-value");

			// IF no change, click only closing popup.
			if(document.querySelectorAll(".only-continue-btn").length > 0){
				window.parent.document.getElementById("yp-current-page").classList.remove("active");
				window.parent.document.querySelectorAll('#customizing-type-list > ul > li[data-value="'+editMode+'"]')[0].click();
				return false;
			}

			// Generating location URL
			var pageHref;
			var pageType;
			var pageID;

			// Base
			var yp_base_uri = "<?php echo yp_get_uri(); ?>";

			// Getting Href
			if(document.querySelectorAll(".customize-special-url.active").length > 0){

				pageHref = encodeURIComponent(document.getElementsByClassName("customize-url-input")[0].value);

				// Li Href
				var liHref = document.querySelectorAll('.customize-type-select-list li[data-type-href="'+pageHref+'"]');

				// find info by href
				if(liHref.length > 0){

					pageType = liHref[0].getAttribute("data-type-value");
					pageID = liHref[0].getAttribute("data-id-value");

					// Go
					goLink(yp_base_uri, pageHref, pageID, pageType, editMode);

				// Get page details with ajax
				}else{

					// Get page link
					var pageHrefGo = decodeURIComponent(pageHref);

					// Add slash to end
                    pageHrefGo = pageHrefGo.replace(/\/?(\?|#|$)/, '/$1');

					// XMLHTTP
					var xhttp = new XMLHttpRequest();
					xhttp.open("POST", location.protocol+"//"+pageHrefGo, true);
					xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
					xhttp.overrideMimeType('text/html');
					xhttp.send("yp_get_details=true");

					// When ready
					xhttp.onreadystatechange = function(){

					    // Done
					    if (this.readyState == 4) {
					    	
					        // Success
					        if(this.status == 200){

					        	var parser = new DOMParser();
								response = parser.parseFromString(this.responseText, "text/html");

								if(response.getElementById("yp_page_details") == null){
									alert("YellowPencil can't reach this page.");
									return false;
								}

					        	response = response.getElementById("yp_page_details").innerHTML;

					            // Find page informations
					            var pageID = response.split("|")[0];
					            var pageType = response.split("|")[1];

					            // Go
								goLink(yp_base_uri, pageHref, pageID, pageType, editMode);

					        }else{

					            pageType = 'general';
								pageID = 0;

								// Go
								goLink(yp_base_uri, pageHref, pageID, pageType, editMode);

					        }

					    }

					}

				}


			// get info by active select
			}else{

				var activeLi = document.querySelectorAll('.customize-type-select-list li.active')[0];
				pageHref = activeLi.getAttribute("data-type-href");
				pageType = activeLi.getAttribute("data-type-value");
				pageID = activeLi.getAttribute("data-id-value");

				// Go
				goLink(yp_base_uri, pageHref, pageID, pageType, editMode);

			}

		}

		function goLink(yp_base_uri, pageHref, pageID, pageType, editMode){

			var visitorView = false;

			// Visitor View
			if(document.querySelectorAll(".customize-visitor-view.active").length > 0){
				visitorView = true;
			}

			if(visitorView){
				visitorView = "&yp_out=true";
			}else{
				visitorView = '';
			}

			var redirectURL = yp_base_uri + "&href=" + pageHref + "&yp_page_id=" + pageID + "&yp_page_type=" + pageType + "&yp_mode=" + editMode + visitorView;

			window.parent.document.getElementById("iframe").style.display = 'none';
			window.parent.document.body.classList.remove("yellow-pencil-ready");
			window.parent.document.getElementsByClassName("loading-files")[0].innerHTML = 'Page loading..';
			window.parent.location = redirectURL;

		}

		function newTypeCancel(){

			var parentIframe = window.parent.document.getElementById("yp-customizing-type-frame");
			window.parent.document.getElementById("yp-current-page").classList.remove("active");
			parentIframe.style.display = 'none';


			// update URL too
	        if (window.parent.history.replaceState){
	            if(window.parent.location.href.split("&yp_load_popup=").length > 0){
					window.parent.history.replaceState(null, null, window.parent.location.href.split("&yp_load_popup=")[0]);
	        	}
	    	}

		}

		function get_url_params(url) {

		    var queryString = url ? url.split('?')[1] : window.location.search.slice(1);
		    var obj = {};

		    if (queryString) {

		        queryString = queryString.split('#')[0];
		        var arr = queryString.split('&');

		        for (var i = 0; i < arr.length; i++) {

		            var a = arr[i].split('=');

		            var paramNum = undefined;
		            var paramName = a[0].replace(/\[\d*\]/, function(v) {
		                paramNum = v.slice(1, -1);
		                return '';
		            });

		            var paramValue = typeof(a[1]) === 'undefined' ? true : a[1];

		            paramName = paramName.toLowerCase();
		            paramValue = paramValue.toLowerCase();

		            if (obj[paramName]) {
		                if (typeof obj[paramName] === 'string') {
		                    obj[paramName] = [obj[paramName]];
		                }
		                if (typeof paramNum === 'undefined') {
		                    obj[paramName].push(paramValue);
		                } else {
		                    obj[paramName][paramNum] = paramValue;
		                }
		            } else {
		                obj[paramName] = paramValue;
		            }
		        }
		    }

		    return obj;

		}


		function auto_fill(){

			// Finish loaded.
			window.parent.document.body.classList.add("yp-yellow-pencil");
			window.parent.document.body.classList.add("yellow-pencil-ready");
			window.parent.document.getElementById("iframe").classList.add("yp-yellow-pencil");
			window.parent.document.getElementById("iframe").classList.add("yellow-pencil-ready");

			var url_string = window.location.href;
			var url = get_url_params(url_string);

			// gettings
			var id = url.yp_page_id;
			var type = url.yp_page_type;
			var mode = url.yp_mode;
			var visitor = url.yp_out;

			// Disable current active page
			if(id != null){

				// active
				var active = document.querySelectorAll('.customize-type-select-list li.active');

				// Get it
				var idTypeFilter = document.querySelectorAll('.customize-type-select-list li[data-id-value="'+id+'"][data-type-value="'+type+'"]');
				var idFilter = document.querySelectorAll('.customize-type-select-list li[data-id-value="'+id+'"]');
				var typeFilter = document.querySelectorAll('.customize-type-select-list li[data-type-value="'+type+'"]');

				// Search active page
				if(idTypeFilter.length > 0){
					
					if(active.length > 0){active[0].classList.remove("active");}
					idTypeFilter[0].classList.add("active");

				}else if(idFilter.length > 0){
					
					if(active.length > 0){active[0].classList.remove("active");}
					idFilter[0].classList.add("active");

				}else if(typeFilter.length > 0){

					if(active.length > 0){active[0].classList.remove("active");}
					typeFilter[0].classList.add("active");

				}

			// Home page active by default.
			}

			// Apply visitor view
			if(visitor != null){
				document.getElementsByClassName("customize-visitor-view")[0].classList.add("active");
			}

			// Apply mode
			if(mode != null){
				document.querySelectorAll(".customize-type-radio.active")[0].classList.remove("active");
				document.querySelectorAll(".customize-type-radio[data-value='"+mode+"']")[0].classList.add("active");
			}

			// Apply Active
			typeListSelect(document.querySelectorAll('.customize-type-select-list li.active')[0]);

		}

		// Close Iframe with ESC
		document.onkeydown = function(evt) {

		    evt = evt || window.event;
		    var isEscape = false;

		    if ("key" in evt) {
		        isEscape = (evt.key == "Escape" || evt.key == "Esc");
		    } else {
		        isEscape = (evt.keyCode == 27);
		    }

		    if (isEscape) {

		    	if(document.getElementsByClassName("yp-exit-confirm-box")[0].style.display == 'block'){
		    		actionBtn("cancel", null);
		    	}else{
		        	newTypeCancel();
		        }

		    }
		};

		function actionBtn(key, element){

			if(key == 'save'){

				// Save click
				window.parent.document.querySelectorAll(".yp-save-btn")[0].click();

					element.innerHTML = 'Saving..';
					element.classList.add("disabled");

					// Done.
	                window.savingCheckerX = setInterval(function(){

	                    if(window.parent.document.querySelectorAll(".yp-save-btn.waiting-for-save").length == 0){
	                    	clearInterval(window.savingCheckerX);

	                    	setTimeout(function(){
								element.innerHTML = 'Saved..';
	                    	}, 100);

	                    	setTimeout(function(){
	                    		newTypeContinue();
	                    	}, 600);

	                    }

					}, 200);

			}

			if(key == 'nosave'){

				// remove for no ask a confirm exit alert
				window.parent.document.querySelectorAll(".yp-save-btn.waiting-for-save")[0].classList.remove("waiting-for-save");

				element.classList.add("disabled");
				element.innerHTML = 'Loading..';

				setTimeout(function(){
					newTypeContinue();
				}, 100);

			}

			if(key == 'cancel'){

				document.getElementsByClassName("yp-exit-confirm-box")[0].style.display = "none";
				document.getElementsByClassName("yp-exit-confirm-bg")[0].style.display = "none";

			}

		}

		function formChange(){

			// URL
			var url_string = window.location.href;
			var url = get_url_params(url_string);

			// Current Settings
			var id = url.yp_page_id;
			var href = url.yp_page_href;
			var type = url.yp_page_type;
			var mode = url.yp_mode;
			if(url.yp_out == null){var visitor = false;}else{var visitor = url.yp_out;}

			// ----

			// Getting New Popup Settings
			var idPopup;
			var hrefPopup;
			var typePopup;
			var modePopup = document.querySelectorAll(".customize-type-radio.active")[0].getAttribute("data-value");
			var visitorPopup = false;

			// Getting from href
			if(document.querySelectorAll(".customize-special-url.active").length > 0){

				hrefPopup = encodeURIComponent(document.getElementsByClassName("customize-url-input")[0].value);

				// Li Href
				var listElement = document.querySelectorAll('.customize-type-select-list li[data-type-href="'+hrefPopup+'"]');

				// find info by href
				if(listElement.length > 0){
					typePopup = listElement[0].getAttribute("data-type-value");
					idPopup = listElement[0].getAttribute("data-id-value");
				}else{
					typePopup = 'general';
					idPopup = 0;
				}

			}else{

				var active = document.querySelectorAll('.customize-type-select-list li.active')[0];
				hrefPopup = active.getAttribute("data-type-href");
				typePopup = active.getAttribute("data-type-value");
				idPopup = active.getAttribute("data-id-value");

			}

			// Visitor View
			if(document.querySelectorAll(".customize-visitor-view.active").length > 0){
				visitorPopup = true;
			}

			// string to b.. because used in url like a string.
			if(visitor == "true"){visitor = true;}
			if(visitor == "false"){visitor = false;}

			// Filtering URL
			href = decodeURIComponent(href);
			hrefPopup = decodeURIComponent(hrefPopup);
			if (href[href.length-1] === "/"){href = href.slice(0,-1);}
    		if (hrefPopup[hrefPopup.length-1] === "/"){hrefPopup = hrefPopup.slice(0,-1);}


			if(idPopup == id && hrefPopup == href && typePopup == type && visitorPopup == visitor){

				// Continue if same
				document.querySelectorAll(".new-edit-continue")[0].innerHTML = "Continue";
				document.querySelectorAll(".new-edit-continue")[0].classList.add("only-continue-btn");

			}else{

				// Customize if not same
				document.querySelectorAll(".new-edit-continue")[0].innerHTML = "Customize";
				document.querySelectorAll(".new-edit-continue")[0].classList.remove("only-continue-btn");
				
			}

		}

	</script>
</head>
<body onload="auto_fill()">

	<div class="yp-new-edit-popup-background" onclick="newTypeCancel();"></div>

	<div class="yp-new-edit-popup">

		<div class="type-select-placeholder" onclick="closeSelect(this)"></div>

		<h3 id="choose-page-type">Select The Target page&hellip;</h3>

		<div class="customize-type-page-section">
			<input type="text" class="customize-url-input" onkeyup="customURL(this)" onchange="customURL(this)" placeholder="<?php $sample_url = get_home_url(null,'/example-page'); $sample_url = explode("://", esc_url($sample_url)); echo $sample_url[1]; ?>" />
			<div class="customize-type-select" onclick="pageChoose(this)">Select a page...</div>

			<span class="customize-special-url" onclick="typeToggleURL(this)" title="select a page by the link">www</span>

			<div class="customize-type-select-list">
				<ul>

					<?php

					// Getting tag href
					$tag_id = 0;
					$tags = get_tags(array('orderby' => 'count', 'order' => 'DESC','number'=> 1 ));
					if(empty($tags) == false){
						$tag_id = $tags[0];
						$tag_link = get_tag_link($tag_id);
					}else{
						$tag_link = null;
					}

					// Getting cat href
					$cat_id = 0;
					$cats = get_categories(array('orderby' => 'count', 'order' => 'DESC','number'=> 1 ));
					if(empty($cats) == false){
						$cat_id = $cats[0];
					}

					$cat_link = get_category_link($cat_id);

					// Getting archive link
					$latest_post = get_posts("post_type=post&numberposts=1");
					if(isset($latest_post[0])){
						$latest_post_id = $latest_post[0]->ID;
						$last_post_date = get_the_date("Y",$latest_post_id);
						$archive_link = get_home_url()."/".$last_post_date;
					}else{
						$archive_link = null;
					}

					?>
					

					<?php

						$homeRule = "";
						$searchRule = "";
						$tagRule = "";
						$categoryRule = "";
						$archiveRule = "";
						$authorRule = "";
						$style404Rule = "";
						$loginRule = "";
						$registerRule = "";
						$lostpassRule = "";

						// check the style
						$hasHome = "";
						$hasSearch = "";
						$hasTag = "";
						$hasCategory = "";
						$hasArchive = "";
						$hasAuthor = "";
						$has404 = "";

						// Admin
						$hasLogin = "";
						$hasRegister = "";
						$hasLostPass = "";

						// Global
						$globalRule = "Empty";

						// get option home
						if($frontpage_id == 0 || $frontpage_id == null){
							$homeStyle = get_option("wt_home_css");
						}else{
							$homeStyle = get_post_meta($frontpage_id, '_wt_css', true);
						}

						// get option general
						$searchStyle = get_option("wt_search_css");
						$tagStyle = get_option("wt_tag_css");
						$categoryStyle = get_option("wt_category_css");
						$archiveStyle = get_option("wt_archive_css");
						$authorStyle = get_option("wt_author_css");
						$style404 = get_option("wt_404_css");

						// Admin
						$loginStyle = get_option("wt_login_css");
						$registerStyle = get_option("wt_register_css");
						$lostpassStyle = get_option("wt_lostpassword_css");

						// Global
						$globalStyle = get_option("wt_css");

						// check option
						if(empty($homeStyle) != true && $homeStyle != "false"){
							$hasHome = " has-style";
							$homeRule = substr_count($homeStyle, ';');
						}

						// check option
						if(empty($searchStyle) != true && $searchStyle != "false"){
							$hasSearch = "class='has-style'";
							$searchRule = substr_count($searchStyle, ';');
						}

						// check option
						if(empty($tagStyle) != true && $tagStyle != "false"){
							$hasTag = "class='has-style'";
							$tagRule = substr_count($tagStyle, ';');
						}

						// check option
						if(empty($categoryStyle) != true && $categoryStyle != "false"){
							$hasCategory = "class='has-style'";
							$categoryRule = substr_count($categoryStyle, ';');
						}

						// check option
						if(empty($archiveStyle) != true && $archiveStyle != "false"){
							$hasArchive = "class='has-style'";
							$archiveRule = substr_count($archiveStyle, ';');
						}

						// check option
						if(empty($authorStyle) != true && $authorStyle != "false"){
							$hasAuthor = "class='has-style'";
							$authorRule = substr_count($authorStyle, ';');
						}

						// check option
						if(empty($style404) != true && $style404 != "false"){
							$has404 = "class='has-style'";
							$style404Rule = substr_count($style404, ';');
						}

						// check option
						if(empty($loginStyle) != true && $loginStyle != "false"){
							$hasLogin = "class='has-style'";
							$loginRule = substr_count($loginStyle, ';');
						}

						// check option
						if(empty($registerStyle) != true && $registerStyle != "false"){
							$hasRegister = "class='has-style'";
							$registerRule = substr_count($registerStyle, ';');
						}

						// check option
						if(empty($lostpassStyle) != true && $lostpassStyle != "false"){
							$hasLostPass = "class='has-style'";
							$lostpassRule = substr_count($lostpassStyle, ';');
						}

						// Check global value
						if($globalStyle != false && empty($globalStyle) != true){
							$globalRule = substr_count($globalStyle, ';') . " Rule";
						}

					?>

					<li class="parent-select-list">General</li>

					<?php

					if($frontpage_id == 0 || $frontpage_id == null){ ?>
						<li onclick="typeListSelect(this)" class="active<?php echo $hasHome; ?>" data-id-value="home" data-single="<?php echo $homeRule; ?>" data-template="<?php echo $homeRule; ?>" data-type-value="home" data-type-href="<?php echo yp_urlencode(esc_url(get_home_url())); ?>"><i onclick="seePageLink(this)"></i><span>Homepage</span></li>
					<?php } ?>
			        <li onclick="typeListSelect(this)" data-id-value="search" <?php echo $hasSearch; ?> data-template="<?php echo $searchRule; ?>" data-type-value="search" data-type-href="<?php echo yp_urlencode(esc_url(get_home_url().'/?s='.yp_getting_last_post_title())); ?>"><i onclick="seePageLink(this)"></i><span>Search page</span></li>
			        <?php if($tag_link != null){ ?><li onclick="typeListSelect(this)" <?php echo $hasTag; ?> data-template="<?php echo $tagRule; ?>" data-id-value="tag" data-type-value="tag" data-type-href="<?php echo yp_urlencode(esc_url($tag_link)); ?>"><i onclick="seePageLink(this)"></i><span>Tag page</span></li><?php } ?>
			        <?php if($cat_link != null){ ?><li onclick="typeListSelect(this)" data-id-value="category" <?php echo $hasCategory; ?> data-template="<?php echo $categoryRule; ?>" data-type-value="category" data-type-href="<?php echo yp_urlencode(esc_url($cat_link)); ?>"><i onclick="seePageLink(this)"></i><span>Category page</span></li><?php } ?>
			        <?php if($archive_link != null){ ?><li onclick="typeListSelect(this)" data-id-value="archive" <?php echo $hasArchive; ?> data-template="<?php echo $archiveRule; ?>" data-type-value="archive" data-type-href="<?php echo yp_urlencode(esc_url($archive_link)); ?>"><i onclick="seePageLink(this)"></i><span>Archive page</span></li><?php } ?>
			        <li onclick="typeListSelect(this)" data-id-value="author" <?php echo $hasAuthor; ?> data-template="<?php echo $authorRule; ?>" data-type-value="author" data-type-href="<?php echo yp_urlencode(esc_url(get_author_posts_url(1))); ?>"><i onclick="seePageLink(this)"></i><span>Author page</span></li>
			        <li onclick="typeListSelect(this)" data-id-value="404" <?php echo $has404; ?> data-template="<?php echo $style404Rule; ?>" data-type-value="404" data-type-href="<?php echo yp_urlencode(esc_url(get_home_url().'/?p=987654321')); ?>"><i onclick="seePageLink(this)"></i><span>404 error page</span></li>


			        <li class="parent-select-list">WordPress</li>
					
					<li onclick="typeListSelect(this)" data-id-value="login" <?php echo $hasLogin; ?> data-single="<?php echo $loginRule; ?>" data-type-value="login" data-type-href="<?php echo yp_urlencode(wp_login_url()); ?>"><i onclick="seePageLink(this)"></i><span>Login page</span></li>
					<?php
						$registerEnable = get_option("users_can_register");
						if($registerEnable){ ?>
						<li onclick="typeListSelect(this)" data-id-value="register" <?php echo $hasRegister; ?> data-single="<?php echo $registerRule; ?>" data-type-value="register" data-type-href="<?php echo yp_urlencode(wp_registration_url()); ?>"><i onclick="seePageLink(this)"></i><span>Register page</span></li>
					<?php } ?>
					<li onclick="typeListSelect(this)" data-id-value="lostpassword" <?php echo $hasLostPass; ?> data-single="<?php echo $lostpassRule; ?>" data-type-value="lostpassword" data-type-href="<?php echo yp_urlencode(wp_lostpassword_url()); ?>"><i onclick="seePageLink(this)"></i><span>Lost Password page</span></li>

					<?php

						// get only visible post types
						$visiblePostTypes = get_post_types(array("public" => true), 'names');

						// Each post types
						foreach ($visiblePostTypes as $post_type){

							// skip
							if($post_type == "snp_popups"){
								continue;
							}

							// query for your post type
							$query = new WP_Query(  
							    array(  
							        'post_type'      => $post_type,  
							        'posts_per_page' => -1  
							    )  
							);

							if ( $query->have_posts() ) {

								// Has Single Style?
								$hasTemplate = "0";

								// this type template
								$templateStyle = get_option('wt_'.$post_type.'_css');

								// check post meta
								if(empty($templateStyle) != true && $templateStyle != "false"){
									$hasTemplate = substr_count($templateStyle, ';');
								}

								// show an label
								echo '<li class="parent-select-list">'.ucfirst($post_type).'</li>';

								// Each lists
								while ( $query->have_posts() ) {

									$query->the_post();
									
									$title = get_the_title();

									$id = get_the_id();

									$infor = "";
									if($id == $frontpage_id){
										$infor = "<strong>Front Page</strong>";
									}else if($id == $blogpage_id){
										$infor = "<strong>Posts Page</strong>";
									}

									// check the style
									$hasStyle = "";

									// Has Single Style?
									$hasSingle = "0";

									// with post meta
									$get_post_meta = get_post_meta($id, '_wt_css', true);

									// check post meta
									if(empty($get_post_meta) != true && $get_post_meta != "false"){
										$hasStyle = "class='has-style'";
										$hasSingle = substr_count($get_post_meta, ';');
									}

									echo '<li onclick="typeListSelect(this)" '.$hasStyle.' data-single="'.$hasSingle.'" data-template="'.$hasTemplate.'" data-id-value="'.$id.'" data-type-value="'.$post_type.'" data-type-href="'.yp_urlencode(esc_url(get_the_permalink())).'"><i onclick="seePageLink(this)"></i><span>' . ucfirst(strtolower(yp_get_short_title($title, 50))).$infor . '</span></li>';
								
								}

							}

						}

					?>

				</ul>
			</div>
		</div>

		<div class="customize-type-checkbox-section">				
			<span class="checkbox-radio customize-visitor-view" onclick="typeCheckbox('visitor')" title="View the page as visitor"><i></i></span>
			<label class="customize-visitor-view" onclick="typeCheckbox('visitor')" title="View the page as visitor">Visitor View</label>
		</div>

		<h3>Customizing Type</h3>

		<div class="customize-type-radio-section">

			<div class="customize-type-radio type-first active" data-value="single" onclick="typeClick(this)">
				<span class="select-radio"><i></i></span><h4>Single</h4>
				<span class="customize-type-icon customize-single-icon"></span>
				<p>apply style just to the current page.</p>
			</div>


			<div class="customize-type-radio type-center" data-value="template" onclick="typeClick(this)">
				<span class="select-radio"><i></i></span><h4>Template</h4>
				<span class="customize-type-icon customize-template-icon"></span>
				<p>apply style to all pages of the current post type.</p>
			</div>


			<div class="customize-type-radio type-last" data-rule="<?php echo $globalRule; ?>" data-value="global" onclick="typeClick(this)">
				<span class="select-radio"><i></i></span><h4>Global</h4>
				<span class="customize-type-icon customize-global-icon"></span>
				<p>apply style to the entire website.</p>
			</div>

			<div class="clearfix"></div>

		</div>

		<div class="new-edit-footer">
			<a class="new-edit-cancel new-edit-btn" onclick="newTypeCancel()">Cancel</a>
			<a class="new-edit-continue new-edit-btn only-continue-btn" onclick="newTypeContinue()">Continue</a>
		</div>

	</div>

	<div class="yp-exit-confirm-bg" onclick="actionBtn('cancel', this);"></div>
	<div class="yp-exit-confirm-box">
		<h3>Do you want to save the current changes?</h3>
		<a class="action-btn" onclick="actionBtn('nosave', this);">Discard</a><a class="action-btn" onclick="actionBtn('cancel', this);">Cancel</a><a class="action-btn primary-btn" onclick="actionBtn('save', this);">Save</a>
	</div>

	</body>
</html>
