// global $ as jQuery / wp jQuery v1.12.4
$ = jQuery;

import Router from "./utils/Router";
import common from "./routes/common";
import home from "./routes/home";
import singlePost from "./routes/single-post";
import pageTemplateRow2Col from "./routes/page-template-row-2-col";
import pageTemplateWedding from "./routes/page-template-wedding";

const routes = new Router({
    common,
    home,
    singlePost,
    pageTemplateRow2Col,
    pageTemplateWedding
});

function ready(func) {
    if (document.attachEvent ? document.readyState === "complete" : document.readyState !== "loading") {
        func();
    } else {
        document.addEventListener("DOMContentLoaded", func);
    }
}

ready(function () {
    document.body.classList.add('page-loaded');
    document.body.classList.remove('unloading');
    routes.loadEvents();
});

window.onunload = function(){}; 