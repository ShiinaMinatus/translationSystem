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
        <div>任务 <a style=" margin-left: 25px;" href="{$websiteUrl}/user/managerPage">返回</a></div>
        <div style="color: red">{$printMessage}</div>
        <table>
            <tr><th >任务流水号</th><th>任务发起者</th><th>任务简介</th><th>任务奖励</th><th>获取任务</th></tr>
                    {foreach from=$translationList item=translationAlls key=key}
                <tr>
                    <td>{$translationAlls.id}</td>
                    <td>{$translationAlls.user_name}</td>
                    <td>
                        将简历从中文翻译成英文
                    </td>
                    <td style="text-align: center;">{$translationAlls.resume_coin}</td>
                    <td><a href="{$websiteUrl}/translation/getMission?translationId={$translationAlls.id}&resumeId={$translationAlls.resume_id}">获取任务</a></td>
                </tr>
            {/foreach}
        </table>
    </body>
</html>
