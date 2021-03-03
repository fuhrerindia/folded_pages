function getbyid(id){
    return document.getElementById(id);
}
function getbytag(id){
    return document.getElementsByTagName(id);
}
function getbyclass(id){
    return document.getElementsByClassName(id);
}
function getbyquery(id){
    return document.querySelector(id);
}
function delete_cookie($cookiename) {
    document.cookie = "<?php echo $cookiename ?>=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
    if (!isset($_COOKIE[$cookiename])) {
        return true;
    } else {
        return false;
    }
}
function open(dest) {
    window.location = dest;
}
function error(msg) {
    console.error(msg);
}
function console(msg) {
    console.log(msg);
}
function warn(msg) {
    console.warn(msg);
}
function showinvite(id){
    notify('Invite Users', 'Use room code "'+ id +'" to join Room on Folded Pages.<br>fp.tminc.ml<br><a onclick="copy('+id+')" style="font-weight:bold;cursor:pointer;">Copy Invitation</a>');
}
function copy(id){
    const el = document.createElement('textarea');
el.value = 'Use room code "'+id+'" to join Room on Folded Pages. Folded Pages: fp.tminc.ml';	
document.body.appendChild(el);
el.select();
document.execCommand('copy');	// Copy command
document.body.removeChild(el);
alert('Copied Invitation.');
open('');
}
function notify(heading, message){
    document.getElementsByTagName('body')[0].style.overflow='hidden';
    getbyid('overlay').style.display='block';
    getbyid('heading').innerHTML=heading;
    getbyid('message').innerHTML=message;
}
function open(dest){
    window.location=dest;
}
function tmincreshidedialog(){
    getbyid('overlay').style.display='none';
    getbytag('body')[0].style.overflow='unset';
}
function save_local(tag, val){
    localStorage.setItem(tag, val);
}
function del_local(tag){
    localStorage.removeItem(tag);
}
function save_cookie(tag, val){
    document.cookie = tag + "="+val+"; expires=; path=/";
}