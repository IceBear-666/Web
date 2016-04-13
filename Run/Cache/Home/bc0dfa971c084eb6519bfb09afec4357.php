<?php if (!defined('THINK_PATH')) exit();?>
================================================== -->
    <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
            <li>
                <a href="<?php echo U('File/download?id='.$info['id']);?>" class="btn btn-primary btn-block btn-large">立即下载</a>
            </li>
        </ul>
       
    </div>

      <div class="span9 main-content">
        <!-- Contents
        ================================================== -->
        <section id="contents">
            <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td width="20%">文件尺寸</td>
                            <td><?php echo ($info["size"]); ?></td>
                        </tr>
                        <tr>
                            <td>下载次数</td>
                            <td><?php echo ($info["download"]); ?></td>
                        </tr>
                        <tr>
                            <td>文件描述</td>
                            <td><?php echo ((isset($info["description"]) && ($info["description"] !== ""))?($info["description"]):'暂无描述'); ?></td>
                        </tr>
                    </tbody>
            </table>

            <div><?php echo ($info["content"]); ?></div>
           
        </section>
    </div>