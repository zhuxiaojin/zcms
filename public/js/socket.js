
window.Echo.channel('Article').listen('ArticleEvent', (e) => {
    $.toast({
        heading:'文章《'+ e.article.title+"》已发布！",
        text: "友情提示",
        showHideTransition: 'plain',
        position: 'top-right',
        loaderBg: '#3b98b5',
        icon: "info",
        hideAfter: 5000,
        stack: 1
    });
});
