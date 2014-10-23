<!DOCTYPE html>
<html>
    <head>
        <title>用户管理</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .divLine{
                display: inline-block;
                width: 30%;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div>
            <div id="titleBar" style=" height: 140px;width: 100%">
                <div class="divLine">
                    <a href="http://localhost/translationSystem/website/task/getAllTask">任务</a> 
                </div>
                <div class="divLine">
                    <a href="http://localhost/translationSystem/website/user/userSetting">设置</a>
                </div>
                <div class="divLine">
                    {if $authority eq 1}
                        <a href="http://localhost/translationSystem/website/user/adminManger">管理</a>
                    {/if}
                </div>
            </div>
        </div>
    </body>
</html>
