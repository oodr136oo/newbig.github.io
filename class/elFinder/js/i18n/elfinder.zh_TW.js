/**
 * 正體中文 translation
 * @author Yuwei Chuang <ywchuang.tw@gmail.com>
 * @author tad0616@gmail.com
 * @version 2016-04-21
 */
if (elFinder && elFinder.prototype && typeof(elFinder.prototype.i18) == 'object') {
    elFinder.prototype.i18.zh_TW = {
        translator : 'Yuwei Chuang &lt;ywchuang.tw@gmail.com&gt;, tad0616@gmail.com',
        language   : '正體中文',
        direction  : 'ltr',
        dateFormat : 'M d, Y h:i A', // Mar 13, 2012 05:27 PM
        fancyDateFormat : '$1 H:i', // will produce smth like: Today 12:25 PM
        messages   : {

            /********************************** errors **********************************/
            'error'                : '錯誤',
            'errUnknown'           : '未知的錯誤.',
            'errUnknownCmd'        : '未知的指令.',
            'errJqui'              : '無效的 jQuery UI 設定. 必須包含 Selectable, draggable 以及 droppable 元件.',
            'errNode'              : 'elFinder 需要能建立 DOM 元素.',
            'errURL'               : '無效的 elFinder 設定! 尚未設定 URL 選項.',
            'errAccess'            : '拒絕存取.',
            'errConnect'           : '無法連線至後端.',
            'errAbort'             : '連線中斷.',
            'errTimeout'           : '連線逾時.',
            'errNotFound'          : '後端不存在.',
            'errResponse'          : '無效的後端回復.',
            'errConf'              : '無效的後端設定.',
            'errJSON'              : '未安裝 PHP JSON 模組.',
            'errNoVolumes'         : '無可讀取的磁碟.',
            'errCmdParams'         : '無效的參數, 指令: "$1".',
            'errDataNotJSON'       : '資料不是 JSON 格式.',
            'errDataEmpty'         : '沒有資料.',
            'errCmdReq'            : '後端請求需要命令名稱.',
            'errOpen'              : '無法打開 "$1".',
            'errNotFolder'         : '非資料夾.',
            'errNotFile'           : '非檔案.',
            'errRead'              : '無法讀取 "$1".',
            'errWrite'             : '無法寫入 "$1".',
            'errPerm'              : '無權限.',
            'errLocked'            : '"$1" 被鎖定,不能重新命名, 移動或删除.',
            'errExists'            : '檔案 "$1" 已經存在了.',
            'errInvName'           : '無效的檔案名稱.',
            'errFolderNotFound'    : '未找到資料夾.',
            'errFileNotFound'      : '未找到檔案.',
            'errTrgFolderNotFound' : '未找到目標資料夾 "$1".',
            'errPopup'             : '連覽器攔截了彈跳視窗. 請在瀏覽器選項允許彈跳視窗.',
            'errMkdir'             : '不能建立資料夾 "$1".',
            'errMkfile'            : '不能建立檔案 "$1".',
            'errRename'            : '不能重新命名 "$1".',
            'errCopyFrom'          : '不允許從磁碟 "$1" 複製.',
            'errCopyTo'            : '不允複製到磁碟 "$1".',
            'errMkOutLink'         : '無法在根目錄以外建立連結', // from v2.1 added 03.10.2015
            'errUpload'            : '上傳錯誤.',  // old name - errUploadCommon
            'errUploadFile'        : '無法上傳 "$1".', // old name - errUpload
            'errUploadNoFiles'     : '未找到要上傳的檔案.',
            'errUploadTotalSize'   : '資料超過了最大允許大小.', // old name - errMaxSize
            'errUploadFileSize'    : '檔案超過了最大允許大小.', //  old name - errFileMaxSize
            'errUploadMime'        : '不允許的檔案類型.',
            'errUploadTransfer'    : '"$1" 傳輸錯誤.',
            'errUploadTemp'        : '無法替上傳檔案建立暫存檔', // from v2.1 added 26.09.2015
            'errNotReplace'        : '"$1" 已經存在此位置, 不能被其他的替换.', // new
            'errReplace'           : '無法替换 "$1".',
            'errSave'              : '無法保存 "$1".',
            'errCopy'              : '無法複製 "$1".',
            'errMove'              : '無法移動 "$1".',
            'errCopyInItself'      : '無法移動 "$1" 到原有位置.',
            'errRm'                : '無法删除 "$1".',
            'errRmSrc'             : '無法删除來源檔案.',
            'errExtract'           : '無法從 "$1" 解壓縮檔案.',
            'errArchive'           : '無法建立壓縮膽案.',
            'errArcType'           : '不支援的壓縮格式.',
            'errNoArchive'         : '檔案不是壓縮檔案, 或者不支援該壓缩格式.',
            'errCmdNoSupport'      : '後端不支援該指令.',
            'errReplByChild'       : '資料夾 “$1” 不能被它所包含的檔案(資料夾)替换.',
            'errArcSymlinks'       : '出于安全上的考量，禁止解壓縮檔案包含不允許的檔案名稱.', // edited 24.06.2012
            'errArcMaxSize'        : '壓縮檔案超過最大允許檔案大小範圍.',
            'errResize'            : '無法重新調整大小 "$1".',
            'errResizeDegree'      : '無效的旋轉角度',  // added 7.3.2013
            'errResizeRotate'      : '無法旋轉圖片',  // added 7.3.2013
            'errResizeSize'        : '無效的圖片尺寸',  // added 7.3.2013
            'errResizeNoChange'    : '圖片尺寸未變動',  // added 7.3.2013
            'errUsupportType'      : '不支援的檔案格式.',
            'errNotUTF8Content'    : '檔案 "$1" 不是 UTF-8 格式, 不能編輯.',  // added 9.11.2011
            'errNetMount'          : '無法掛載 "$1".', // added 17.04.2012
            'errNetMountNoDriver'  : '不支援該通訊協議.',     // added 17.04.2012
            'errNetMountFailed'    : '掛載失敗.',         // added 17.04.2012
            'errNetMountHostReq'   : '需要指定主機位置.', // added 18.04.2012
            'errSessionExpires'    : '太久未動作導致session過期',
            'errCreatingTempDir'   : '無法建立暫存資料夾： "$1"',
            'errFtpDownloadFile'   : '無法從FTP下載此檔： "$1"',
            'errFtpUploadFile'     : '無法將此檔上傳到FTP "$1"',
            'errFtpMkdir'          : '無法在FTP上建立遠端目錄："$1"',
            'errArchiveExec'       : '壓縮檔案錯誤："$1"',
            'errExtractExec'       : '解壓縮檔案錯誤："$1"',
            'errNetUnMount'        : '無法卸載', // from v2.1 added 30.04.2012
            'errConvUTF8'          : '無法轉碼為 UTF-8', // from v2.1 added 08.04.2014
            'errFolderUpload'      : '試試 Google Chrome，假如您想上傳此資料夾', // from v2.1 added 26.6.2015
            'errSearchTimeout'     : '搜尋 "$1" 超時，只取得局部結果。', // from v2.1 added 12.1.2016
            'errReauthRequire'     : '必須重新認證', // from v2.1.10 added 3.24.2016

            /******************************* commands names ********************************/
            'cmdarchive'   : '建立壓縮檔案',
            'cmdback'      : '後退',
            'cmdcopy'      : '複製',
            'cmdcut'       : '剪下',
            'cmddownload'  : '下載',
            'cmdduplicate' : '建立副本',
            'cmdedit'      : '編輯檔案',
            'cmdextract'   : '從壓縮檔案解壓縮',
            'cmdforward'   : '前進',
            'cmdgetfile'   : '選擇檔案',
            'cmdhelp'      : '關於本軟體',
            'cmdhome'      : '首頁',
            'cmdinfo'      : '查看關於',
            'cmdmkdir'     : '建立資料夾',
            'cmdmkdirin'   : '建立新資料夾', // from v2.1.7 added 19.2.2016
            'cmdmkfile'    : '建立文字檔案',
            'cmdopen'      : '打開',
            'cmdpaste'     : '貼上',
            'cmdquicklook' : '預覽',
            'cmdreload'    : '更新',
            'cmdrename'    : '重新命名',
            'cmdrm'        : '删除',
            'cmdsearch'    : '搜尋檔案',
            'cmdup'        : '移到上一層資料夾',
            'cmdupload'    : '上傳檔案',
            'cmdview'      : '查看',
            'cmdresize'    : '重新調整大小',
            'cmdsort'      : '排序',
            'cmdnetmount'  : '掛載網路磁碟機', // added 18.04.2012
            'cmdnetunmount': '卸載', // from v2.1 added 30.04.2012
            'cmdplaces'    : 'To Places', // added 28.12.2014
            'cmdchmod'     : '變更模式', // from v2.1 added 20.6.2015
            'cmdopendir'   : '開啟資料夾', // from v2.1 added 13.1.2016

            /*********************************** buttons ***********************************/
            'btnClose'  : '關閉',
            'btnSave'   : '儲存',
            'btnRm'     : '删除',
            'btnApply'  : '使用',
            'btnCancel' : '取消',
            'btnNo'     : '否',
            'btnYes'    : '是',
            'btnMount'  : '掛載',  // added 18.04.2012
            'btnApprove': '轉到$1並批准', // from v2.1 added 26.04.2012
            'btnUnmount': '卸載', // from v2.1 added 30.04.2012
            'btnConv'   : '轉碼', // from v2.1 added 08.04.2014
            'btnCwd'    : '此處',      // from v2.1 added 22.5.2015
            'btnVolume' : '磁碟',    // from v2.1 added 22.5.2015
            'btnAll'    : '全部',       // from v2.1 added 22.5.2015
            'btnMime'   : 'MIME Type', // from v2.1 added 22.5.2015
            'btnFileName':'檔名',  // from v2.1 added 22.5.2015
            'btnSaveClose': '儲存並關閉', // from v2.1 added 12.6.2015
            'btnBackup' : '備份', // fromv2.1 added 28.11.2015

            /******************************** notifications ********************************/
            'ntfopen'     : '打開資料夾',
            'ntffile'     : '打開檔案',
            'ntfreload'   : '更新資料夾内容',
            'ntfmkdir'    : '建立資料夾',
            'ntfmkfile'   : '建立檔案',
            'ntfrm'       : '删除檔案',
            'ntfcopy'     : '複製檔案',
            'ntfmove'     : '移動檔案',
            'ntfprepare'  : '準備複製檔案',
            'ntfrename'   : '重新命名檔案',
            'ntfupload'   : '上傳檔案',
            'ntfdownload' : '下載檔案',
            'ntfsave'     : '儲存檔案',
            'ntfarchive'  : '建立壓縮檔案',
            'ntfextract'  : '從壓縮檔案解壓縮',
            'ntfsearch'   : '搜尋檔案',
            'ntfresize'   : '正在更改尺寸',
            'ntfsmth'     : '正在忙 >_<',
            'ntfloadimg'  : '正在讀取圖片',
            'ntfnetmount' : '正在掛載網路磁碟機', // added 18.04.2012
            'ntfnetunmount': '卸載網路磁碟機中', // from v2.1 added 30.04.2012
            'ntfdim'      : '獲取圖片尺寸', // added 20.05.2013
            'ntfreaddir'  : '讀取資料夾資訊', // from v2.1 added 01.07.2013
            'ntfurl'      : '取得連結位置', // from v2.1 added 11.03.2014
            'ntfchmod'    : '檔案模式變更中', // from v2.1 added 20.6.2015
            'ntfpreupload': '驗證上傳的檔案名稱', // from v2.1 added 31.11.2015
            'ntfzipdl'    : '為下載建立檔案中', // from v2.1.7 added 23.1.2016

            /************************************ dates **********************************/
            'dateUnknown' : '未知',
            'Today'       : '今天',
            'Yesterday'   : '昨天',
            'msJan'       : '一月',
            'msFeb'       : '二月',
            'msMar'       : '三月',
            'msApr'       : '四月',
            'msMay'       : '五月',
            'msJun'       : '六月',
            'msJul'       : '七月',
            'msAug'       : '八月',
            'msSep'       : '九月',
            'msOct'       : '十月',
            'msNov'       : '十一月',
            'msDec'       : '十二月',
            'January'     : '一月',
            'February'    : '二月',
            'March'       : '三月',
            'April'       : '四月',
            'May'         : '五月',
            'June'        : '六月',
            'July'        : '七月',
            'August'      : '八月',
            'September'   : '九月',
            'October'     : '十月',
            'November'    : '十一月',
            'December'    : '十二月',
            'Sunday'      : '星期日',
            'Monday'      : '星期一',
            'Tuesday'     : '星期二',
            'Wednesday'   : '星期三',
            'Thursday'    : '星期四',
            'Friday'      : '星期五',
            'Saturday'    : '星期六',
            'Sun'         : '周日',
            'Mon'         : '周一',
            'Tue'         : '周二',
            'Wed'         : '周三',
            'Thu'         : '周四',
            'Fri'         : '周五',
            'Sat'         : '周六',

            /******************************** sort variants ********************************/
            'sortname'          : '按名稱',
            'sortkind'          : '按類型',
            'sortsize'          : '按大小',
            'sortdate'          : '按日期',
            'sortFoldersFirst'  : 'Folders first',

            /********************************** new items **********************************/
            'untitled file.txt' : 'NewFile.txt', // added 10.11.2015
            'untitled folder'   : 'NewFolder',   // added 10.11.2015
            'Archive'           : 'NewArchive',  // from v2.1 added 10.11.2015

            /********************************** messages **********************************/
            'confirmReq'      : '請確認',
            'confirmRm'       : '確定要删除檔案嗎?<br/>該操作不可回復!',
            'confirmRepl'     : '用新的檔案替换原有檔案?',
            'confirmConvUTF8' : '不是UTF-8<br/>是否轉碼到 UTF-8？<br/>內容將在儲存轉檔後轉為 UTF-8', // from v2.1 added 08.04.2014
            'confirmNotSave'  : '已經被修改！<br/>若沒有存檔將失去剛剛的所有修改', // from v2.1 added 15.7.2015
            'apllyAll'        : '全部使用',
            'name'            : '名稱',
            'size'            : '大小',
            'perms'           : '權限',
            'modify'          : '修改于',
            'kind'            : '類別',
            'read'            : '讀取',
            'write'           : '寫入',
            'noaccess'        : '無權限',
            'and'             : '和',
            'unknown'         : '未知',
            'selectall'       : '選擇所有檔案',
            'selectfiles'     : '選擇檔案',
            'selectffile'     : '選擇第一個檔案',
            'selectlfile'     : '選擇最後一個檔案',
            'viewlist'        : '列表檢視',
            'viewicons'       : '圖示檢視',
            'places'          : '位置',
            'calc'            : '計算',
            'path'            : '路徑',
            'aliasfor'        : '别名',
            'locked'          : '鎖定',
            'dim'             : '尺寸',
            'files'           : '檔案',
            'folders'         : '資料夾',
            'items'           : '項目',
            'yes'             : '是',
            'no'              : '否',
            'link'            : '連結',
            'searcresult'     : '搜尋结果',
            'selected'        : '選取的項目',
            'about'           : '關於',
            'shortcuts'       : '快捷鍵',
            'help'            : '幫助',
            'webfm'           : '網路檔案總管',
            'ver'             : '版本',
            'protocolver'     : '協定版本',
            'homepage'        : '首頁',
            'docs'            : '文件',
            'github'          : '在Github上Fork我們',
            'twitter'         : '在twitter上關注我們',
            'facebook'        : '在facebook上加入我們',
            'team'            : '團隊',
            'chiefdev'        : '首席開發者',
            'developer'       : '開發者',
            'contributor'     : '貢獻者',
            'maintainer'      : '維護者',
            'translator'      : '翻譯',
            'icons'           : '圖示',
            'dontforget'      : '别忘了帶上你擦汗的毛巾',
            'shortcutsof'     : '快捷鍵已禁用',
            'dropFiles'       : '把檔案拖到此處',
            'or'              : '或者',
            'selectForUpload' : '選擇要上傳的檔案',
            'moveFiles'       : '移動檔案',
            'copyFiles'       : '複製檔案',
            'rmFromPlaces'    : '從位置中删除',
            'aspectRatio'     : '保持比例',
            'scale'           : '寬高比',
            'width'           : '寬',
            'height'          : '高',
            'resize'          : '重新調整大小',
            'crop'            : '裁切',
            'rotate'          : '旋轉',
            'rotate-cw'       : '順時針旋轉90度',
            'rotate-ccw'      : '逆時針旋轉90度',
            'degree'          : '度',
            'netMountDialogTitle' : '掛載網路磁碟', // added 18.04.2012
            'protocol'            : '協定', // added 18.04.2012
            'host'                : '主機', // added 18.04.2012
            'port'                : '接口', // added 18.04.2012
            'user'                : '使用者', // added 18.04.2012
            'pass'                : '密碼', // added 18.04.2012
            'confirmUnmount'      : '確定要掛載 $1？',  // from v2.1 added 30.04.2012
            'dropFilesBrowser': '從瀏覽器拖拉或貼上檔案', // from v2.1 added 30.05.2012
            'dropPasteFiles'  : '拖拉或貼上檔案及網址至此', // from v2.1 added 07.04.2014
            'encoding'        : '編碼', // from v2.1 added 19.12.2014
            'locale'          : '本地',   // from v2.1 added 19.12.2014
            'searchTarget'    : '目標： $1',                // from v2.1 added 22.5.2015
            'searchMime'      : '以 MIME Type 搜尋', // from v2.1 added 22.5.2015
            'owner'           : '擁有者', // from v2.1 added 20.6.2015
            'group'           : '群組', // from v2.1 added 20.6.2015
            'other'           : '其他', // from v2.1 added 20.6.2015
            'execute'         : '執行', // from v2.1 added 20.6.2015
            'perm'            : '權限', // from v2.1 added 20.6.2015
            'mode'            : '模式', // from v2.1 added 20.6.2015
            'emptyFolder'     : '資料夾是空的', // from v2.1.6 added 30.12.2015
            'emptyFolderDrop' : '資料夾是空的\\A 拖曳上傳', // from v2.1.6 added 30.12.2015
            'emptyFolderLTap' : '資料夾是空的\\A 長按上傳', // from v2.1.6 added 30.12.2015
            'quality'         : '品質', // from v2.1.6 added 5.1.2016
            'autoSync'        : '自動同步',  // from v2.1.6 added 10.1.2016
            'moveUp'          : '上移',  // from v2.1.6 added 18.1.2016
            'getLink'         : '取得連結網址', // from v2.1.7 added 9.2.2016
            'selectedItems'   : '選擇項目 ($1)', // from v2.1.7 added 2.19.2016
            'folderId'        : '資料夾 ID', // from v2.1.10 added 3.25.2016
            'offlineAccess'   : '允許離線存取', // from v2.1.10 added 3.25.2016
            'reAuth'          : ' 重新認證', // from v2.1.10 added 3.25.2016

            /********************************** mimetypes **********************************/
            'kindUnknown'     : '未知',
            'kindFolder'      : '資料夾',
            'kindAlias'       : '别名',
            'kindAliasBroken' : '錯誤的别名',
            // applications
            'kindApp'         : '應用程式',
            'kindPostscript'  : 'Postscript 文件',
            'kindMsOffice'    : 'Microsoft Office 文件',
            'kindMsWord'      : 'Microsoft Word 文件',
            'kindMsExcel'     : 'Microsoft Excel 文件',
            'kindMsPP'        : 'Microsoft Powerpoint 簡報',
            'kindOO'          : 'Open Office 文件',
            'kindAppFlash'    : 'Flash 應用程式',
            'kindPDF'         : 'Portable Document Format (PDF)',
            'kindTorrent'     : 'Bittorrent 檔案',
            'kind7z'          : '7z 壓縮檔案',
            'kindTAR'         : 'TAR 壓縮檔案',
            'kindGZIP'        : 'GZIP 壓縮檔案',
            'kindBZIP'        : 'BZIP 壓縮檔案',
            'kindXZ'          : 'XZ 壓縮檔案',
            'kindZIP'         : 'ZIP 壓縮檔案',
            'kindRAR'         : 'RAR 壓縮檔案',
            'kindJAR'         : 'Java JAR 檔案',
            'kindTTF'         : 'True Type 字體',
            'kindOTF'         : 'Open Type 字體',
            'kindRPM'         : 'RPM 封裝',
            // texts
            'kindText'        : '文字檔案',
            'kindTextPlain'   : '純文字',
            'kindPHP'         : 'PHP 程式碼',
            'kindCSS'         : 'CSS',
            'kindHTML'        : 'HTML 文件',
            'kindJS'          : 'Javascript 程式碼',
            'kindRTF'         : '富文字格式(RTF)',
            'kindC'           : 'C 程式碼',
            'kindCHeader'     : 'C 標頭檔',
            'kindCPP'         : 'C++ 程式碼',
            'kindCPPHeader'   : 'C++ 標頭檔',
            'kindShell'       : 'Unix Shell 脚本',
            'kindPython'      : 'Python 程式碼',
            'kindJava'        : 'Java 程式碼',
            'kindRuby'        : 'Ruby 程式碼',
            'kindPerl'        : 'Perl 程式碼',
            'kindSQL'         : 'SQL 脚本',
            'kindXML'         : 'XML 文件',
            'kindAWK'         : 'AWK 程式碼',
            'kindCSV'         : '逗號分隔值檔案(CSV)',
            'kindDOCBOOK'     : 'Docbook XML 文件',
            'kindMarkdown'    : 'Markdown 文件', // added 20.7.2015
            // images
            'kindImage'       : '圖片',
            'kindBMP'         : 'BMP 圖片',
            'kindJPEG'        : 'JPEG 圖片',
            'kindGIF'         : 'GIF 圖片',
            'kindPNG'         : 'PNG 圖片',
            'kindTIFF'        : 'TIFF 圖片',
            'kindTGA'         : 'TGA 圖片',
            'kindPSD'         : 'Adobe Photoshop 圖片',
            'kindXBITMAP'     : 'X bitmap 圖片',
            'kindPXM'         : 'Pixelmator 圖片',
            // media
            'kindAudio'       : '聲音',
            'kindAudioMPEG'   : 'MPEG 聲音',
            'kindAudioMPEG4'  : 'MPEG-4 聲音',
            'kindAudioMIDI'   : 'MIDI 聲音',
            'kindAudioOGG'    : 'Ogg Vorbis 聲音',
            'kindAudioWAV'    : 'WAV 聲音',
            'AudioPlaylist'   : 'MP3 播放列表',
            'kindVideo'       : '影片',
            'kindVideoDV'     : 'DV 影片',
            'kindVideoMPEG'   : 'MPEG 影片',
            'kindVideoMPEG4'  : 'MPEG-4 影片',
            'kindVideoAVI'    : 'AVI 影片',
            'kindVideoMOV'    : 'Quick Time 影片',
            'kindVideoWM'     : 'Windows Media 影片',
            'kindVideoFlash'  : 'Flash 影片',
            'kindVideoMKV'    : 'Matroska 影片',
            'kindVideoOGG'    : 'Ogg 影片'
        }
    };
}

