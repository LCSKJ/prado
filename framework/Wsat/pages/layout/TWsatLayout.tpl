<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <com:THead Title="PRADO - WSAT">
        <com:TMetaTag HttpEquiv="Content-Type" Content="text/html; charset=utf-8" />
        <com:TMetaTag HttpEquiv="Content-Language" Content="en" />
    </com:THead>

    <body>
        <com:TForm>
            
            <div id="header">
                <a href="<%= $this->Service->DefaultPageUrl %>">
                    <div class="logo"></div>
                    <div style="float: left; margin-top: 17px">PRADO <br /> Web Site Administration Tool</div>
                </a>
                <div class="mantisbg"></div>
                <div style="clear: both"></div>
            </div>
            
            <div class="mainmenu">
                <div style="float: right"><com:TLinkButton Text="Logout" OnClick="logout" /></div>
                <div style="float: right"><com:THyperLink NavigateUrl="https://github.com/pradosoft/prado4" Text="Prado framework" Target="_blank" />&nbsp;|&nbsp;</div>
                <div style="float: right"><com:THyperLink NavigateUrl="<%= $this->Service->DefaultPageUrl %>" Text="Web App" Target="_blank" />&nbsp;|&nbsp;</div>
                <div style="clear: both"></div>
            </div> 
            
            <div id="central_div">
                <div id="toc">
                    <div class="topic">
                        <div>Code Generation</div>
                        <ul>
                            <li><com:THyperLink NavigateUrl="<%= $this->Service->constructUrl('TWsatGenerateAR') %>" Text="AR Classes" /></li>
                            <!---
                            <li><com:THyperLink NavigateUrl="<%= $this->Service->constructUrl('TWsatScaffolding') %>" Text="Scaffolding" /></li>
                            --->
                        </ul>
                    </div>
                </div>            

                <div id="content">
                    <com:TContentPlaceHolder ID="Content" />
                </div>
                
                <div style="clear: both"></div>
            </div>            
            
            <div id="footer">
                Copyright &copy; 2005-<%= date('Y') %> <a href="https://github.com/pradosoft">The PRADO Group</a>.
                <br/><br/>
                <%= Prado::poweredByPrado() %>
            </div>
        </com:TForm>   
    </body>
</html>