<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        {if $addFruit eq 1}
            <div>恭喜你注册成功，请登陆注册邮箱激活该账号。账号激活后将会自动进入审核流程</div>
        {else if $addFruit eq 3}
            <div>注册失败，已有重复的邮箱存在。</div>
        {else}
            <div>注册失败，请联系管理员。</div>
        {/if}
    </body>
</html>
