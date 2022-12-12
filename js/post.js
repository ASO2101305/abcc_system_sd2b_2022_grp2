'use strict'

if(typeof POST_JS != "undefined"){
    // alert("Post.jsはすでに読み込まれました");
    // console.log('Post.jsはすでに読み込まれました');
    throw new Error('Post.jsはすでに読み込まれました');
    // 読み込み中断
}else{
    const POST_JS = "POST_JS";
    var divCartBtn;
}
/**
 * @param action
 * @param dataObject
 * @param element
 */

function execPostAsync(action, dataObject, arg_element){
    // (1)XMLHttpRequestオブジェクトを作成
    let xmlHttpRequest = new XMLHttpRequest();
    // (2)HTTPのPOSTメソッドとアクセスする場所を指定
    xmlHttpRequest.open('POST',action,true);
    // (3)送信する内容の形式を設定
    xmlHttpRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xmlHttpRequest.onload = function () {
		//ここに完了時の処理を書く
		//サーバーサイドからの返り値はthis.responseTextとかでもらう
        // alert(this.response+" :レス");
        // alert(arg_element.value+" :element");
        if(arg_element!=null){
            arg_element.value = this.response;
        }
	}
    let paramString = '';
    if( dataObject != undefined ){
        let lastkey = Object.keys(dataObject).pop();
        for(let paramName in dataObject){
            paramString = paramString.concat(paramName);
            paramString = paramString.concat("=");
            paramString = paramString.concat(dataObject[paramName]+(lastkey !== paramName ? '&' : '' ));
        }

    }
    xmlHttpRequest.send(paramString);
}
