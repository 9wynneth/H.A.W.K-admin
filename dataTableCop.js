(function(g){"function"===typeof define&&define.amd?define(["jquery","datatables.net","datatables.net-buttons"],
function(d){return g(d,window,document)}):"object"===typeof exports?module.exports=function(d,f){d||
(d=window);if(!f||!f.fn.dataTable)f=require("datatables.net")(d,f).$;f.fn.dataTable.Buttons||
require("datatables.net-buttons")(d,f);return g(f,d,d.document)}:g(jQuery,window,document)})
(function(g,d,f,h){d=g.fn.dataTable;
return d.Buttons});