<html>
<head>
</head>
<body>
Sample JSON consumption page.
<p/>
<div id="smartSheetData"></div>
</body>
<script type="text/javascript" language="JavaScript">
<!--
function smartSheetData_load(smartSheetData) {
var divNode;
var tableHTML;
var files;
var allColumns;
divNode = document.getElementById("smartSheetData");
if (divNode) {
tableHTML = new Array();
// view
tableHTML.push('<TABLE cellpadding="2" cellspacing="0">');
tableHTML.push('<TBODY>');
tableHTML.push('<TR>');
tableHTML.push('<TD>');
tableHTML.push(smartSheetData.name);
tableHTML.push('</TD>');
tableHTML.push('</TR>');
tableHTML.push('</TBODY>');
tableHTML.push('</TABLE>');
// files
files = smartSheetData.files;
if (files) {
tableHTML.push('<p/>&nbsp;<b>SHEET LEVEL FILES</b><br>');
tableHTML.push(writeFiles(files));
}
// sheet
columns = smartSheetData.columns;
if (columns) {
tableHTML.push('<p/>&nbsp;<b>THE SHEET</b><br>');
rows = smartSheetData.rows;
tableHTML.push(writeData(columns, rows));
}
// available columns
allColumns = smartSheetData.availableColumns;
if (allColumns) {
tableHTML.push('<p/>&nbsp;<b>ALL COLUMNS</b><br>');
tableHTML.push(writeColumns(allColumns));
}
// data
divNode.innerHTML = tableHTML.join('');
}
}
function writeData(columns, rows)
{
var dataHTML;
var column;
var row;
var setLength;
var rowsLength;
var i;
var j;
var rowIndex;
var indexCount;
dataHTML = new Array();
dataHTML.push('<TABLE cellpadding="2" cellspacing="0" style="border: 1px solid grey;">');
dataHTML.push('<TBODY>');
dataHTML.push('<TR>');
setLength = columns.length;
for (i = 0; i < setLength; i++) {
column = columns[i];
// displayName
dataHTML.push('<TD style="border: 1px solid grey;"><nobr><b>');
dataHTML.push(column.displayName);
dataHTML.push('</b></nobr></TD>');
}
dataHTML.push('<TD style="border: 1px solid grey;"><b>');
dataHTML.push('FILES');
dataHTML.push('</b></TD>');
dataHTML.push('</TR>');
if (rows) {
indexCount = 0;
rowsLength = rows.length;
for (j = 0; j < rowsLength; j++) {
row = rows[j];
rowIndex = parseInt(row.rowIndex);
while (indexCount < rowIndex) {
dataHTML.push('<TR>');
dataHTML.push(writeRow(columns, null));
dataHTML.push('</TR>');
indexCount++;
}
dataHTML.push('<TR>');
dataHTML.push(writeRow(columns, row));
dataHTML.push('</TR>');
indexCount++;
}
}
dataHTML.push('</TBODY>');
dataHTML.push('</TABLE>');
return dataHTML.join('');
}
function writeRow(columns, row)
{
var dataHTML;
var column;
var values;
var value;
var valueText;
var files;
var setLength;
var valuesLength;
var i;
var j;
var k;
var level;
dataHTML = new Array();
setLength = columns.length;
for (i = 0; i < setLength; i++) {
column = columns[i];
// value
dataHTML.push('<TD style="border: 1px solid grey;">');
valueText = '&nbsp;';
if (row) {
values = row.values;
if (values != null) {
valuesLength = values.length;
for (j = 0; j < valuesLength; j++) {
value = values[j];
if (value.columnName == column.columnName) {
if (value.value != null) {
valueText = '<nobr>';
if (value.columnName == 'std:taskName') {
level = parseInt(row.hierarchyLevel);
for (k = 0; k < level; k++) {
valueText += '&nbsp;&nbsp;';
}
}
valueText += value.value;
valueText += '</nobr>';
}
break;
}
}
}
}
dataHTML.push(valueText);
dataHTML.push('</TD>');
}
// files
dataHTML.push('<TD style="border: 1px solid grey;">');
valueText = '&nbsp;';
if (row) {
files = row.files;
if (files) {
valueText = writeFiles(files);
}
}
dataHTML.push(valueText);
dataHTML.push('</TD>');
return dataHTML.join('');
}
function writeFiles(files)
{
var fileHTML;
var file;
var setLength;
var i;
fileHTML = new Array();
fileHTML.push('<TABLE cellpadding="2" cellspacing="0">');
fileHTML.push('<TBODY>');
setLength = files.length;
for (i = 0; i < setLength; i++) {
file = files[i];
fileHTML.push('<TR>');
// displayName
fileHTML.push('<TD>');
fileHTML.push('<A HREF="');
fileHTML.push(file.link);
fileHTML.push('">');
fileHTML.push(file.name);
fileHTML.push('</A>');
fileHTML.push('</TD>');
fileHTML.push('</TR>');
}
fileHTML.push('</TBODY>');
fileHTML.push('</TABLE>');
return fileHTML.join('');
}
function writeColumns(columns)
{
var columnHTML;
var column;
var setLength;
var i;
columnHTML = new Array();
columnHTML.push('<TABLE cellpadding="2" cellspacing="0">');
columnHTML.push('<TBODY>');
setLength = columns.length;
for (i = 0; i < setLength; i++) {
column = columns[i];
columnHTML.push('<TR>');
// name
columnHTML.push('<TD>');
columnHTML.push(column.columnName);
columnHTML.push('</TD>');
// displayName
columnHTML.push('<TD>');
columnHTML.push(column.displayName);
columnHTML.push('</TD>');
columnHTML.push('</TR>');
}
columnHTML.push('</TBODY>');
columnHTML.push('</TABLE>');
return columnHTML.join('');
}
-->
</script>
<script src="https://publish.smartsheet.com/d320b7d498224ef0aa8fd441d8110a75"></script>
</html>