(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){

},{}],2:[function(require,module,exports){

const fs = require('fs');


function back() {
    event.preventDefault();
    console.log('back');
    location.href = 'courses_questions.html';
    return false;

}

function okay() {
    event.preventDefault();
    const title = document.getElementById('title').value;
    const link = document.getElementById('link').value;
    const description = document.getElementById('description').value;
    fs.readFile('./databases.json', 'utf8', (err, data) => {

        if (err) {
            console.log(`Error reading file from disk: ${err}`);
        } else {

            const databases = JSON.parse(data);

            // print all databases
            databases.forEach(db => {
                console.log(`${db.name}: ${db.type}`);
            });
        }

    });

    console.log('okay');
    return false;

}

function del() {
    const yes = confirm('Вы уверены, что хотите удалить курс?');
    if (yes) {

    }
    return false;

}

window.back = back;
window.del = del;
window.okay = okay;


},{"fs":1}]},{},[2]);
