<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title>Bootstrap Template</title>
        <!-- 新 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        {{--<link href="//cdn.bootcss.com/emojify.js/0.9.5/emojify-emoticons.css" rel="stylesheet">--}}
        <link href="//cdn.bootcss.com/emojify.js/0.9.5/emojify.min.css" rel="stylesheet">
        <style>
            .emoji {
                width: 22px;
                height: 22px;
                vertical-align: middle;
                /*width: 1.5em;*/
                /*height: 1.5em;*/
                /*display: inline-block;*/
                /*margin-bottom: -0.25em;*/
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <span class="emoji">emoji表情 :smile: :smile:</span>
            </div>
        </div>

        <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
        <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="//cdn.bootcss.com/emojify.js/0.9.5/emojify.js"></script>
        <script>
            emojify.setConfig({

                emojify_tag_type : 'div',           // Only run emojify.js on this element
                only_crawl_id    : null,            // Use to restrict where emojify.js applies
                img_dir          : 'http://www.emoji-cheat-sheet.com/graphics/emojis',  // Directory for emoji images
                ignored_tags     : {                // Ignore the following tags
                    'SCRIPT'  : 1,
                    'TEXTAREA': 1,
                    'A'       : 1,
                    'PRE'     : 1,
                    'CODE'    : 1
                }
            });
            emojify.run();
//            var emoji = emojify.replace('I am happy :)');
//            $('.emoji').html(emoji);
        </script>
    </body>
</html>