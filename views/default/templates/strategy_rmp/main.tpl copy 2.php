<!DOCTYPE html>
<html>
<head>

  
  <script type='text/javascript' src='external/raphael/raphael-min.js'></script>

  


<script type='text/javascript'>//<![CDATA[ 
window.onload=function(){
	var rsr = Raphael('rsr', '1000', '590');

/* the connecting lines*/
//var path_bh = rsr.path("M613.554,540.887l-0.002-2l255.519-0.342l0.002,2L613.554,540.887z M472.397,528.237  l-0.679-1.881l101.119-36.496l0.68,1.881L472.397,528.237z M388.918,524.971l-93.547-26.713l0.549-1.924l93.547,26.713  L388.918,524.971z M569.95,477.179l-92.497-103.472l1.491-1.333l92.496,103.473L569.95,477.179z M317.516,417.771l-1.195-1.604  l69.387-51.721l1.195,1.604L317.516,417.771z M600.034,396l-231.3-127.405l0.965-1.752l231.3,127.405L600.034,396z M147.072,373.92  l-44.627-122.886l1.88-0.683l44.627,122.886L147.072,373.92z M722.597,368.142l-1.873-0.701l35.341-94.362l1.873,0.701  L722.597,368.142z M267.484,349.853l-1.964-0.379l16.156-83.68l1.964,0.379L267.484,349.853z M907.21,338.827l-1.947-0.459  l10.077-42.778l1.947,0.459L907.21,338.827z M617.106,264.466L303.512,145.108l0.711-1.869l313.594,119.357L617.106,264.466z   M874.772,213.44l-17.691-40.096l1.83-0.808l17.691,40.096L874.772,213.44z M638.668,205.172l-56.86-7.851l0.273-1.981l56.86,7.851  L638.668,205.172z M756.416,180.182l-124.543-8.125l0.131-1.996l124.543,8.125L756.416,180.182z M275.543,48.511l-0.06-1.999  l288.572-8.57l0.059,1.999L275.543,48.511z");
//path_bh.attr({opacity: '0.7',fill: '#010101','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_bh');
/* end connecting lines*/

/* NY? group_a, rect_bk, grou_b, path_bl, group_c, path_bm, group_c, group_d, rect_bn, path_bo, group_e, group_f, path_bp, group_g, group_h, group_i, group_j, path_bq, path_br, path_bs, path_bt, path_bu */
var group_a = rsr.set();
var rect_bk = rsr.rect(251.127, 142.488, 2, 39.417);
rect_bk.attr({x: '251.127',y: '142.488',fill: '#6E6F72',parent: 'group_a','stroke-width': '0','stroke-opacity': '1'});
rect_bk.transform("m0.7144 0.6997 -0.6997 0.7144 185.5053 -130.0997").data('id', 'rect_bk');
group_a.attr({'name': 'group_a'});
var group_b = rsr.set();
var path_bl = rsr.path("M 267.859,246.129 261.215,222.915 232.189,196.836 217.555,196.836 200.096,201.679     189.204,209.015 167.53,221.806 132.554,231.856 132.001,229.934 166.854,219.919 188.136,207.325 199.249,199.838     199.405,199.795 217.419,194.836 232.956,194.836 262.98,221.811 269.782,245.58    z");
path_bl.attr({fill: '#6E6F72',parent: 'group_a','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_bl');
group_b.attr({'parent': 'group_a','name': 'group_b'});
var group_c = rsr.set();
var path_bm = rsr.path("M 260.859,196.836 231.236,196.836 236.988,177.304 208.139,177.943 195.734,170.424      191.885,156.148 193.816,155.627 197.457,169.129 208.677,175.93 239.679,175.245 233.91,194.836 260.454,194.836      283.121,185.264 306.299,178.478 306.861,180.396 283.738,187.167     z");
path_bm.attr({fill: '#6E6F72',parent: 'group_a','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_bm');
group_c.attr({'parent': 'group_a','name': 'group_c'});
var group_d = rsr.set();
var rect_bn = rsr.rect(282.401, 199.701, 2, 67.727);
rect_bn.attr({x: '282.401',y: '199.701',fill: '#6E6F72',parent: 'group_a','stroke-width': '0','stroke-opacity': '1'});
rect_bn.transform("m0.6445 0.7646 -0.7646 0.6445 279.3355 -133.6574").data('id', 'rect_bn');
group_d.attr({'parent': 'group_a','name': 'group_d'});
var group_e = rsr.set();
var path_bo = rsr.path("M 266.133,149.211 199.414,131.33 199.931,129.398 265.707,147.027 279.719,136.438        300.342,129.417 300.986,131.311 280.668,138.229       z");
path_bo.attr({fill: '#6E6F72',parent: 'group_a','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_bo');
group_e.attr({'parent': 'group_a','name': 'group_e'});
var group_f = rsr.set();
var path_bp = rsr.path("M 213.042,97.383 212.371,95.5 234.98,87.444 257.295,87.444 279.786,77.419 280.601,79.247         257.721,89.444 235.326,89.444        z");
path_bp.attr({fill: '#6E6F72',parent: 'group_a','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_bp');
group_f.attr({'parent': 'group_a','name': 'group_f'});
var group_g = rsr.set();
var path_bq = rsr.path("M 132.474,187.204 132.081,185.243 150.981,181.482 166.949,181.482 185.374,169.098          195.596,147.892 195.596,134.06 211.707,112.938 211.707,97.441 196.384,97.419 159.396,89.421 159.819,87.466          196.703,95.441 213.707,95.441 213.707,113.614 197.596,134.736 197.596,148.349 186.94,170.456 167.558,183.482          151.081,183.482         z");
path_bq.attr({fill: '#6E6F72',parent: 'group_a','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_bq');
group_g.attr({'parent': 'group_a','name': 'group_g'});
var group_h = rsr.set();
var path_br = rsr.path("M 140.294,244.125 131.277,231.209 131.277,186.704 110.95,170.435 92.029,148.778           93.535,147.462 112.397,169.052 133.277,185.742 133.277,230.581 141.934,242.98          z");
path_br.attr({fill: '#6E6F72',parent: 'group_a','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_br');
group_h.attr({'parent': 'group_a','name': 'group_h'});
var group_i = rsr.set();
var path_bs = rsr.path("M 77.527,255.697 69.66,231.383 62.39,222.508 45.123,210.843 46.242,209.186            63.845,221.127 71.446,230.407 79.431,255.082           z");
path_bs.attr({fill: '#6E6F72',parent: 'group_a','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_bs');
group_i.attr({'parent': 'group_a','name': 'group_i'});
/* NY outline */
var group_j = rsr.set();
var path_bt = rsr.path("M299.535,300.428v-2.108l-1.574-1.123l-0.644-1.944v-1.347l5.305-2.017v-0.414l0.248-0.248v-0.248            l0.826-0.825l0.986-4.438l1.485-1.486h1.881v-1.098l2.322-1.161l1.608,0.27l-0.279-0.978l0.5-1.506l0.533-0.179v-0.674            l0.414-1.133l1.022-1.532l2.26,1.397l-0.334-0.802l1.309-2.942l2.998-1.498h2.562l-0.216-0.435l0.862-2.15l2.101-0.423            l0.693,0.349l0.447-0.896l1.609-0.404l4.562,0.508l1.665,0.029l0.868,0.216h0.578l1.57-0.981l0.506-0.676l0.107-0.432            l-0.719-1.441l1.47-0.985l1.361-1.02l0.75,0.249l8.312-2.081l7.319-1.223l6.247-3.245l1.92-3.6l2.376-1.899l0.499-1.746            l1.408-1.033l1.735-0.868l0.295-0.444l0.789-1.799l0.584-0.878l2.298-1.786l0.742-0.742h1.317l1.118,0.375l1.095,1.094            l-0.761,2.289l-1.022,1.025l-1.283,0.641l-0.732-0.733l-0.737,0.861l-1.978,2.967l0.19,0.112h1.62l-0.464,0.926            l1.979-1.328l1.383,0.694l0.198,0.589l0.699-0.618v-1.155l1.219-1.222l1.448,0.479l0.696-0.584l0.307-1.23h1.157            l1.144-0.961l-0.24,0.961h0.781l0.31-0.448l1.032-1.032h0.401v-0.849l1.256-0.631h0.66l-0.208-0.623l1.841-0.602            l1.482-0.245l0.461,1.22l3.005,0.001l-3.396,2.262l-4.729,4.978l-2.835,1.416l0.254,1.019l-0.86-0.573l-1.63,1.357            l1.504,1.614l-4.228,4.785l-2.593,1.802l-1.291,0.646l-1.308,1.571l-1.693,0.42l-0.868,0.871l-1.574,1.841l-2.81,1.277            l-4.261,3.234l-0.35,0.176l-0.673,0.67h-1.521l-0.727-1.438l-1.113,0.419v1.664l-1.228,1.232l-1.499,0.342l-0.686-0.019            l-0.897-0.179l-0.041,0.021l-0.987,0.988l-1.334,0.639l-2.879,0.727l-0.246,0.738l-3.046,1.524h-1.213l-0.42-0.21            l0.176,0.531v1.064L343,283.02l-4.023,0.046l-0.618,0.894l-0.608,0.607l-2.959,1.48l-1.517,1.492l-0.994,0.614            l-4.561,1.44l-4.848,3.01l-1.612,0.439v1.115l-9.001,2.119l-6.27,3.761h-4.177l0.711-0.708l-0.845,0.374L299.535,300.428z             M299.654,295.948l1.881,1.342v0.293l1.381-0.616l0.727-0.725l0.877-0.437l-0.365-0.365l-0.647-1.282l0.675-0.675            l-4.758,1.772L299.654,295.948z M306.267,294.229l1.228,1.232l2.361-1.539l-3.459,0.178L306.267,294.229z             M304.622,292.303v0.742l0.903-0.903l4.989-0.257l1.011-0.505h2.937l1.955,0.978l1.949-0.445l1.268-0.5l2.567-0.7            l4.792-2.988l4.549-1.437l0.541-0.359l1.522-1.525l2.96-1.48l0.309-0.308l0.402-0.605l0.497-0.99h4.243l-0.187-0.566            v-1.518l1.257-0.629h1.212l0.493,0.247h0.268l1.883-0.942l0.247-0.74l1.067-0.506l2.854-0.715l0.743-0.369l0.987-0.988            l0.945-0.471l1.471,0.293h0.27l0.598-0.149l0.251-0.251v-0.157l-1.59-1.589l3.012-1.006l5.253-1.994l2.659-0.669            l0.379-0.258l2.51-1.141l1.301-1.519l-0.328-0.328l-0.449-1.355l0.118-0.238l-0.547,0.109l-1.083-0.27h-0.366            l-0.942,1.254l-1.028-0.516h-0.511l-2.227,1.118l0.82-3.293l0.953-1.258l0.851-0.836l0.795-0.594l0.528-1.07v-0.164            l0.248-0.822v-0.41l0.827-0.838h0.689l1.245-1.434l0.442-0.438v-0.248l0.43-1.29l0.607-0.302l-0.829-0.829l0.463-0.695            l-0.376,0.188l-0.645,0.482l-0.489,1.712l-2.554,2.04l-2.025,3.797l-1.271,0.639l-5.956,3.051l-7.398,1.233l-6.563,1.646            v0.742l-1.079,1.079l-1.91-0.019l-0.294,1.182l-0.972,1.299l-2.374,1.483l-1.515-0.029l-0.868-0.216l-1.467-0.006            l-1.604-0.178l0.003,0.003v2.402h-2.686l-0.75,1.119l-1.309-0.868l0.028,0.028l-0.898,1.797l-2.125-0.353h-1.411v-0.493            h-1.23l-1.933,0.967l-0.667,1.5l1.48,3.556l-2.257,0.75l-0.816-0.612l0.026,0.077v1.312l-1.493,1.5l-1.135-1.14            l0.162,0.707v2.213l-2.503-0.997l-1.054-0.177l-0.634,0.317v1.861h-3.052l-0.488,0.488l-0.986,4.437l-0.652,0.653v0.247            L304.622,292.303z M324.944,271.852l0.337,0.337l0.143-0.705l-0.361,0.072L324.944,271.852z M340.171,266.338l0.179,0.359            v-0.489L340.171,266.338z M372.549,261.857l0.938,0.465l0.126,0.381l0.393-0.472l1.599-0.8l2.307-1.616l2.779-3.173            l-1.713-1.838l2.798-2.332l-0.113-0.024h-0.537l-0.169-0.255l-0.092,0.077l0.039-0.156l-0.357-0.46l0.366,0.732            l-1.292,0.648l-1.327,1.033l-1.141,0.571l-0.348-0.35l-0.387,0.776l-1.056,0.793l-1.884,2.59l-0.456,0.764l0.542,1.627            L372.549,261.857z M366.456,261.298l1.522,0.03l0.767,0.191l0.817-0.163l0.686-0.449l0.839-0.418l0.188-0.188            l-0.441-1.331l0.819-1.364l-1.4-0.696l-0.12-0.18l-0.947,1.139h-0.567l-0.134,0.482v0.236l-0.951,1.904L366.456,261.298z             M372.052,254.643l0.782,1.171l-0.197,0.393l1.403-1.858l0.798-0.6l0.111-0.221l-0.954-1.271l-0.643,1.283l-1.349,0.342            l-0.064,0.193v0.342L372.052,254.643z M386.643,248.622l-0.966,1.548l0.069-0.034l1.786-1.88h-0.523L386.643,248.622z             M376.025,245.006l0.464,0.464l0.235-0.236l0.2-0.601l-0.229-0.077h-0.162L376.025,245.006z");
path_bt.attr({fill: '#6E6F72',parent: 'group_a','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_bt');
var path_bu = rsr.path("M302.514,292.916l-0.636-3.26l0.035-2.976l1.664-5.982l-0.234-1.409l0.509-2.794v-2.475            l-16.086-5.36l-5.411-1.723l-21.168-7.055l-0.589-1.473l-1.705-1.734l-0.507-0.76l-0.466,0.466h-1.323l-0.571-0.572            l-0.675-0.134l-2.121,0.707h-1.387l-1.436-0.718l-0.447-0.673l-0.315-0.104l-2.356-0.264l-0.942-0.628l-1.221-0.958            l-3.354-4.311l-0.892-0.594l-0.393-1.229l-0.71-4.285l-1.028-2.312v-1.009l0.494-0.768l-0.284-0.85l-0.947-0.315            l-2.379-0.48l0.94-2.191l-0.377-0.19l-0.885-0.884l-1.105-0.223l-1.144-0.684h-0.273l-2.776,1.11l-1.434-0.958            l-0.609-1.521l-0.489-1.466l-0.292-0.583l-0.878-0.35l-1.428-0.478l-1.761-0.701l-0.104-0.417l-6.991,1.396l-6.127,1.472            l-6.201,1.242l-6.382,1.472l-12.358,2.472l-6.128,1.47l-25.198,4.94l-6.12,1.47l-24.943,4.94l-12.579,2.465l-6.455,0.994            l-18.702,3.692l-6.196,0.994L66.1,258.826l-6.204,0.994l-6.379,1.227l-6.196,0.99l-6.383,1.239l-6.196,0.994l-6.38,1.227            l-8.947,1.386l-0.362-2.907l-0.503-1.803l-0.481-3.613l-0.503-1.812l-0.731-5.358l-0.501-2.041l-0.248-1.972l-0.477-2.129            l-0.503-4.247l-0.481-2.165l-0.265-2.065l-0.475-2.128l-0.337-2.65l12.312-8.977l6.434-4.454l12.676-9.264l1.813-2.494            l1.354-3.163v-2.271l-0.238-0.477l-0.568-0.283l-1.277-0.274l-1.375-0.564l-2.179-1.369l-0.715-1.069l-0.33-1.649            l0.211-0.843l-0.209-0.418l-0.671-0.472l-1.346-1.348l-0.426-0.849v-1.952l0.248-0.493v-1.869l-1.182-5.199l-0.44-0.879            l-2.166-3.845l-5.762-7.685l4.802-3.305l5.382-4.16l8.271-6.003l2.862-1.56l10.523-1.753l72.206-13.777l1.033-1.032h0.183            l1.251-3.755l1.227-3.927l2.472-7.414l1.228-3.928l2.472-7.415l1.323-4.143l0.815-1.344l2.986-3.802v-1.055l0.785-1.142            l0.42-0.385l4.592-2.901l0.516-0.515l0.305-0.763l-1.081-2.157l1.388-2.377l3.343-3.576l6.66-4.933l1.063-0.642            l0.304-0.607l0.553-2.832l1.232-2.465l1.254-2.259l1.798-4.058l4.44-5.92l4.164-6.127l3.953-5.68l2.597-3.85l5.631-5.33            l2.218-1.232l0.527-0.354l1.483-1.974l3.02-2.013l1.56-1.534l0.991-0.662h0.979l5.609-0.732l1.362-0.255h0.603            l4.308-1.196l4.231-0.996l8.888-1.976l4.18-0.985l4.401-1.223l4.488-0.999l4.182-0.984l4.451-0.988l4.126-1.216            l8.943-1.991l4.127-1.216l3.167-0.706l0.496,1.491l0.794,1.409l0.23,0.768l0.294,0.293v3.074l-0.494,1.233v1.857            l0.248,0.247v0.494l0.642,0.644l1.039,0.791l0.784,0.782v0.92l0.246,0.492v3.852l0.248,1.562v3.848l0.205,1.026            l1.121,2.476l0.887,1.106l2.798,2.825l0.556,0.848l0.421,0.842l0.423,0.425v0.745l0.247,0.74l-0.039,3.149l-0.455,1.591            v0.854l0.141,0.282l1.565,3.456l0.249,1.232l0.265,1.677v0.975l-0.499,1.004l-0.497,0.248l-0.283,0.451l-0.377,0.38            l-0.316,0.642v0.394l0.247,1.333v0.739l-0.523,5.667l-0.207,0.833l0.06,0.06l0.246,0.492l1.234,1.232l0.423,0.851v0.588            l0.688,2.292l0.937,2.572l0.586,0.943l0.34,0.17l0.653,0.653v0.424l0.248,0.494v0.566l0.246,0.741v1.523l1.373,1.64            l0.354,0.705v0.63l0.246,1.332l-0.006,0.851l-0.733,7.041v0.578l0.787,2.239l0.358-0.713l-0.246-0.987l0.305-0.625v-0.414            l1.082-1.078h0.241l0.245-0.247h2.313l0.926,0.963l1.174,1.877l0.544,0.546l0.604,0.365l0.707,0.707l0.282,1.399            l0.272,0.626l0.245,1.232l0.483,1.927l0.507,2.776l0.727,2.894l1.49,7.197l0.739,3.7l0.97,3.637l1.493,7.201l0.732,2.925            l0.507,2.776l0.479,1.909l0.23,1.149l0.291,0.585v0.628l0.249,1.333v1.954l2.106,3.685l-0.627,1.255v6.176l-0.248,4.739            l0.001,4.632l-0.249,4.738l0.001,4.632l-0.247,4.737l0.001,4.634l-0.247,4.982l0.001,2.886l1.643,1.174l8.14,47.421            l2.095,2.111l0.658,0.872l1.627,1.222l-1.144,1.682l-8.168,8.168l2.695,2.698h0.244l1.152,1.147l1.042,2.085h-0.372            l0.116,0.233l-0.426,0.854l-0.43,1.611v0.82l-1.979,0.417l-0.097,0.195l-1.469,2.693l-0.398,0.999v2.287h-0.964            l0.508,0.843l2.114,2.114h-3.751l-1.502,0.43l-1.303,0.649l-0.9,0.721l-0.403,1.42l-0.778,4.159L302.514,292.916z             M305.374,279.304l0.257,1.553l-0.323,0.974l-0.4,1.466l1.224-0.951l1.652-0.805l1.566-0.448l-0.565-1.065v-1.346            l1.233-0.62v-0.681l0.614-1.52l1.857-3.471l1.044-0.484l0.56-0.112l0.419-1.466l-0.895-0.446l0.539-1.072l-0.1-0.1h-0.245            l-4.702-4.695l9.405-9.406l-0.403-0.352l-0.701-0.93l-2.381-2.383l-0.308-1.529l-7.828-45.734l-1.806-1.291v-3.965            l0.246-4.982l-0.001-4.637l0.247-4.737l-0.001-4.633l0.249-4.738l-0.001-4.632l0.248-4.739l-0.001-6.596l0.36-0.719            l-1.839-3.217v-2.385l-0.249-1.333v-0.259l-0.226-0.533l-0.246-1.232l-0.482-1.925l-0.507-2.776l-0.727-2.895            l-1.491-7.199l-0.97-3.638l-2.23-10.897l-0.733-2.924l-0.507-2.777l-0.48-1.911l-0.229-1.149l-0.271-0.623l-0.188-0.937            l-0.169-0.169l-0.597-0.359l-0.884-0.92l-1.295-1.997h-0.648l-0.245,0.247h-0.169l-0.173,0.348l0.245,0.987l-0.305,0.624            v0.416l-0.426,0.424l-0.245,0.493l-0.902,0.9h-1.073l-1.147-1.147l-0.375-0.77l-0.79-2.371l0.006-1.507L286.596,98v-0.587            l-0.315-1.727l-0.133-0.133l-1.523-1.822v-1.925l-0.246-0.741v-0.417l-0.239-0.478l-0.494-0.247l-0.367-0.737            l-0.565-0.899l-1.242-3.48l-0.545-2.041V82.51l-0.067-0.135l-1.234-1.233l-0.248-0.495l-0.422-0.425l0.029-1.146            l0.227-0.912l0.486-5.349l-0.003-0.546l-0.247-1.336v-0.978l0.672-1.34l0.491-0.494l0.325-0.647l0.483-0.241v-0.412            l-0.448-2.465l-0.187-0.374l-1.585-3.417l0.039-1.741l0.455-1.591v-2.41l-0.247-0.74v-0.243l-0.068-0.068l-0.538-1.074            l-0.404-0.607l-2.715-2.723l-1.104-1.413l-0.245-0.493l-1.073-2.47l-0.265-1.428v-3.863l-0.248-1.562v-3.462l-0.246-0.492            v-0.562l-0.151-0.152l-1.039-0.791l-1.275-1.276v-0.493l-0.248-0.247v-3.074l0.494-1.233v-1.857l-0.148-0.148l-0.28-1.114            l-0.711-1.187l-1.343,0.298l-4.126,1.216l-8.944,1.991l-4.126,1.216l-4.504,1.002l-4.182,0.984l-4.449,0.988l-4.389,1.22            l-4.23,0.998L220,33.943l-4.181,0.983l-4.668,1.259h-0.64l-1.135,0.227l-5.87,0.76h-0.438l-0.404,0.27l-1.562,1.534            l-2.816,1.878l-1.483,1.973l-0.881,0.587l-2.175,1.212l-5.254,5.015l-2.405,3.605l-3.958,5.688l-4.185,6.156l-4.397,5.865            l-1.677,3.837l-1.276,2.306l-1.145,2.292l-0.56,2.846l-0.624,1.248l-1.483,0.889l-6.504,4.823l-3.064,3.3l-0.664,1.162            l0.853,1.704v0.676l-0.642,1.603l-1.058,1.022l-4.689,2.999l-0.27,0.404v0.917l-0.464,0.885l-2.918,3.646l-0.642,1.072            l-1.197,3.832l-2.472,7.415l-1.228,3.929l-2.472,7.414l-1.227,3.927l-1.188,3.647v0.416l-1.078,1.078h-0.248l-0.91,0.911            l-72.802,13.867l-10.214,1.702l-2.509,1.368l-8.085,5.879l-5.403,4.175L32.56,170.3l4.624,6.181l2.221,3.944l0.598,1.256            l1.258,5.648v2.455l-0.248,0.493v1.005l0.069,0.137l1.049,1.05l0.876,0.585l0.778,1.556l-0.282,1.125l0.164,0.818            l0.272,0.408l0.574,0.383l1.123,0.672l1.074,0.43l1.391,0.316l1.285,0.64l0.749,1.497v3.153l-1.671,3.837l-2.19,2.931            l-12.823,9.371l-6.434,4.454l-11.34,8.27l0.174,1.386l0.475,2.128l0.264,2.064l0.495,2.233l0.489,4.179l0.477,2.128            l0.256,2.004l0.497,2.016l0.734,5.368l0.498,1.786l0.486,3.641l0.503,1.803l0.12,0.961l0.719-0.103l6.149-0.982            l6.379-1.227l6.194-0.994l6.384-1.239l6.198-0.99l6.379-1.227l6.196-0.992l6.125-1.227l6.421-1.234l6.196-0.994            l18.701-3.692l6.455-0.994l37.439-7.389l6.127-1.472l25.199-4.941l6.121-1.469l12.366-2.474l6.382-1.472l6.192-1.239            l6.127-1.472l7.303-1.46l1.49-0.749l0.424,1.704l0.756,0.302l1.428,0.477l1.639,0.651l0.719,1.46l0.491,1.478l0.401,0.918            l2.156-0.862h1.21l1.324,0.791l1.36,0.274l1.223,1.153h2.12l-1.2,2.479l0.145,0.037l1.954,0.651l0.704,2.105v0.96            l-0.488,0.731l0.962,2.224l0.246,1.232l0.488,3.165l0.111,0.333l0.589,0.393l3.471,4.461l1.371,0.987l2.181,0.266            l1.069,0.354l0.535,0.805l0.538,0.269h0.59l2.316-0.771l1.79,0.356l0.248,0.247l0.148-0.148l1.086-0.54l1.234,0.616            l0.37,0.736l0.404,0.605l1.801,1.803l0.397,0.992l20.275,6.758l5.411,1.723l13.91,4.635l-1.88-4.983l-0.493-2.713            l-0.183-0.726l-0.576-0.771l-0.576-0.576l-0.987-0.492l-1.005-1.011l-0.743-1.97l-0.522-0.596l-0.356-0.704v-1.145            l0.352-1.016l0.342-0.653l1.806-2.407l1.265,3.159l-0.284,1.428v0.473l0.845,0.845l1.609,0.92l0.953,0.655l0.87,0.871            l1.061,2.391l0.808,2.431l1.253,6.359l-0.016,5.603L305.374,279.304z M302.366,265.961l0.894,2.347l-0.61-3.053            l-0.722-2.162l-0.222-0.497l0.169,0.679L302.366,265.961z M300.125,260.334l0.597,0.612l0.615,0.822l-0.284-0.636            l-0.538-0.538L300.125,260.334z");
path_bu.attr({fill: '#6E6F72',parent: 'group_a','stroke-width': '0','stroke-opacity': '1'}).data('id', 'path_bu');
group_j.attr({'parent': 'group_a','name': 'group_j'});

/* end NY outline */
/* end NY? */




var rsrGroups = [group_a, rect_bk, group_b, path_bl, group_c, path_bm, group_c, group_d, rect_bn, path_bo, group_e, group_f, path_bp, group_g, group_h, group_i, group_j, path_bq, path_br, path_bs, path_bt, path_bu];

//var rsrGroups = [group_a,group_b,group_c,group_d,group_e,group_f,group_g,group_h,group_i,group_j,group_k,group_l,group_m,group_n,group_o,group_p,group_q,group_r,group_s,group_t,group_u,group_v,group_w,group_x,group_y,group_z,group_aa,group_ab,group_ac,group_ad,group_ae,group_af,group_ag,group_ah,group_ai,group_aj,group_ak,group_al,group_am,group_an,group_ao,group_ap,group_aq,group_ar,group_as,group_at,group_au,group_av,group_aw,group_ax,group_ay,group_az,group_ba,XMLID_2_,group_bb,group_bc];


for (var i = 0, len = rsrGroups.length; i <= len; i++) {

    var el = rsrGroups[i];

    el.mouseover(function() {
        this.toFront();
        this.attr({
            cursor: 'pointer',
            fill: '#990000',
            stroke: '#fff',
            'stroke-width': '2'
        });
        this.animate({
            scale: '1.2'
        }, 200);
    });
    el.mouseout(function() {
        this.animate({
            scale: '1.05'
        }, 200);
        this.attr({
            fill: '#003366',
            stroke: 'none'
            
});
    });
    el.click(function() {
        this.animate({
            fill: 'green'
        }, 200);
    });

}
}//]]>  

</script>


</head>
<body>
	<center>
	<div id="main">
		<div id="rsr"></div>
	</div>
	</center>
</body>


</html>