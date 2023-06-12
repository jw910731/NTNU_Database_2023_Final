<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $main_category = [
            '3C', '周邊', 'NB', '通訊', '數位', '家電', '日用', '母嬰', '食品', '生活',
            '居家', '休閒', '保健', '美妝', '時尚'
        ];
        $sub_category = [
            [
                'SanDisk', 'Seagate', 'TP-Link', '創見', '三星儲存',
                '筆記電腦', '桌上電腦', '商用電腦', 'DIY電腦', 'LCD螢幕',
                '電競螢幕', '網路', '視訊監控', 'SSD', '外接硬碟',
                '內接硬碟', '網路硬碟', 'CPU', '主機板', '顯示卡',
                '電源供應器', '電腦機殼', '記憶體', '記憶卡', '隨身碟',
                'UPS', '電腦擴充', '軟體', '耗材', '線材',
                '電競專區', '台灣精品', '企業專區', '清倉', '南紡3C',
                '露天'
            ],
            [
                'Logitech羅技', 'Razer雷蛇', 'HermanMiller', 'HyperX', '微軟Office',
                'Marshall', '滑鼠', '鍵盤', '喇叭', '耳機/麥克風',
                '直播設備', 'USBHUB/周邊', '線材', '延長線', '電競椅',
                '辦公椅', '電腦軟體', '下載/點數', '噴墨印表機', '雷射印表機',
                '墨水匣/標籤帶', '碳粉匣', '手寫/繪圖板', '閱讀器', '紙類',
                '辦公設備', '營業設備', '辦公傢俱', '商用列印', '充電/電池'
            ],
            [
                'Intel第13&12代', '筆記電腦', 'ASUS華碩', 'ACER宏碁', 'HP惠普',
                'Lenovo聯想', '微軟Surface', 'DELL戴爾', '其他品牌', 'APPLE',
                'ASUSZenBook', 'ThinkPad商務', 'ROG潮流電競', 'MSI微星電競', '技嘉電競',
                'RAZER電競', 'HP電競', 'LEGION電競', '特仕筆電', '商用筆電',
                'EVO輕薄筆電', '2in1/觸控筆電', '電競筆電', 'NVIDIA創作專區'
            ],
            [
                'APPLE', '三星旗艦', 'Android', 'Google', '小米',
                'realme', 'Jabra', '鐵三角', 'Sennheiser', 'UAG',
                '犀牛盾', '魚骨牌', '惡魔殼', 'OtterBox', 'imos',
                'Belkin', '麥多多', '綠聯', '大通', 'MAGEASY',
                'Gramas', '智慧手機', 'POCO', 'OPPO', 'vivo',
                '華為', '平板', '一般手機', '福利品', '藍牙耳機',
                '智慧穿戴', 'Qi/行電 ', '旅遊卡', 'APPLE周邊'
            ],
            [
                '正成CSEmart', 'SONY', 'Nintendo', 'Xbox', 'PlayStation',
                'GoPro', 'DJI旗艦館', 'Bose旗艦館', 'Nikon旗艦館', 'CANON',
                'Jabra', '鐵三角', '森海塞爾耳機', '電玩/遊戲', '藍牙耳機',
                '遊戲配件/周邊', '智慧穿戴', '運動/攝影機', '空拍機', '數位相機',
                '相機鏡頭', '微單/單眼相機', '鏡頭濾鏡', '防潮箱', '攝錄影器材',
                '相機專業配件', '攝影腳架', '錄音/音訊周邊'
            ],
            [
                'dyson', 'dysonhair', '三星旗艦', '石頭科技', 'LG',
                '伊萊克斯', '飛利浦', 'BOSE旗艦', 'Bosch', 'FUJI',
                '輝葉', '歐姆龍', 'Nespresso', '雀巢', 'Sodastream',
                '小米', '冷暖空調', '液晶電視', '影音/劇院', '洗/乾衣機',
                '冰箱', '電風扇', '除濕機', '清淨機', '投影機',
                '吸塵器', '掃地機', '美容家電', '按摩家電', '食物調理',
                '料理電器', '電子鍋/電鍋', '烤箱/微波爐', '洗/烘碗'
            ],
            [
                '舒潔', '幫寶適', '滿意寶寶', '白蘭/熊寶貝', '多芬/麗仕',
                '五月花', '倍潔雅', '春風', '花仙子', '毛孩嚴選',
                '衛生紙', '嬰童紙尿褲', '衛生棉', '洗衣精', '家用清潔',
                '洗髮精', '牙膏牙刷漱口水', '沐浴乳/洗手乳', '臉部清潔', '掃除用具',
                '除濕除蟲', '濕紙巾', '成人紙尿褲', '防護抗菌', '寵物用品/貓砂',
                '狗食/罐頭', '貓食/罐頭', '小動物/水族', '天然有機', '箱購日用品',
                '商店街', '3M科技生活館', '泰國購物', '南紡生活'
            ],
            [
                '樂高', 'Combi', 'LAVIDA', '安琪兒', '婦幼',
                '嬰童', '推車汽座', '洗沐保養', '孕哺', '童裝',
                '玩具', '積木', '床寢家居', '嬰童紙尿褲', '濕紙巾',
                '婦幼保健', '滴雞精', '奶粉', '婦幼保養', '桌遊',
                '模型公仔', '卡通館', '兒童家具'
            ],
            [
                '太古可口可樂', '日本一蘭', '雀巢Nestle', '快車肉乾', '萬歲牌Viva',
                '盛香珍', '乖乖', 'OREO', '旺旺', 'Airwaves',
                '生鮮超市', '肉粽/冷凍食品', '熟食/小吃', '團購美食', '水果/蔬菜/甜點',
                '票券', '海鮮肉品', '有機/生機', '進口零食', '進口飲料',
                '進口沖調', '進口食材', '飲料', '礦泉水', '堅果',
                '零食/餅乾', '沖泡/蜂蜜', '茶葉/茶包', '麥片', '咖啡、濾掛',
                '奶粉/副食品', '米/食材', '罐頭/醬料'
            ],
            [
                'MUJI無印良品', '樂高', 'BRITA', 'J-bedtime', '康寧',
                '膳魔師', '樂扣樂扣', 'Combi', 'WMF', '有責商行',
                'WUZ屋子', '台隆手創館', '鍋具', '餐廚', '烘焙用具',
                '餐具/保鮮盒', '隨行杯/保溫瓶', '酒杯/玻璃杯', '咖啡/茶具', '婦幼',
                '嬰童', '推車/汽座', '孕哺', '童裝', '寢具/枕頭',
                '名寢', '床包', '床墊', '玩具', '積木',
                '桌遊', '模型公仔', '卡通館', '衛浴用品', '衛浴設備',
                '家飾', '票券', '儲值'
            ],
            [
                'BOSCH', '得利塗料', 'H&D東稻家居', 'IRIS', 'hoi!好好生活',
                '3M生活', 'OKAMURA', '未來實驗室', '飛利浦照明', '舞光照明',
                '生活工場', '華燈市', '台隆手創館', '電動工具', '修繕五金',
                '塗料地板', '電子鎖', '居家安全設備', '電腦椅', '層架',
                '收納用品', '沙發/沙發床', '椅子/椅凳', '桌子/茶几', '床',
                '櫃子', '衣架/曬衣架', '兒童家具', '文具用品', '辦公用品',
                '園藝植栽', '燈管燈泡', '燈飾', '開運'
            ],
            [
                '夏日出遊必買', 'GARMIN', 'TheNorthFace', 'Mizuno', 'NewBalance',
                'PUMA', 'Asics', '米其林輪胎', '米其林精品', '車麗屋',
                'SPORT.TOWN', 'ABCMart', 'SHIMANO', 'Columbia', '歐都納',
                '毛孩嚴選', '露營/野炊', '登山配件', '水上活動/泳具', '機車',
                '機車百貨', '汽車百貨', '行車記錄器', '輪胎', '雨傘/雨衣',
                '健身/重訓', '單車/電動車', '運動服'
            ],
            [
                '保健熱銷榜', '白蘭氏錠劑', '大研生醫', '白蘭氏', '亞培',
                '船井生醫', '葡萄王', '益富', '達摩本草', '三得利',
                '善存', '悠活原力', '補體素', '三多', '日落恩賜',
                '利捷維', '桂格', '勁漢英雄', '御熹堂', 'ON',
                '娘家', 'LAC', '永信', '雀巢', '藥師健生活',
                'm2美度', '力度伸拜維佳', '義美生醫', '瑪卡', '魚油',
                '美顏', '窈窕', '葉黃素', '益生菌', '維他命',
                '機能', '婦幼', '男性', '運動', '營養品',
                '銀髮族', '醫療口罩', '醫療用品'

            ],
            [
                '巴黎萊雅媚比琳', 'PK百貨價', 'Aesop', '碧兒泉', '蘭芝',
                '寶拉珍選', '佳麗寶集團', '理膚寶水', '歐舒丹', '施巴',
                '提提研', '妮維雅', '雅漾', '慕之恬廊', 'DHC',
                'AHC', 'KOSE', 'CeraVe', '薇姿', 'Mdmmd明洞國際',
                '專櫃保養', '專櫃彩妝', '醫美保養', '開架保養', '韓系品牌',
                '日本藥妝', '彩妝美甲', '沙龍髮品', '染髮造型', '香水',
                '手工香氛皂', '香氛美體', '精油擴香', '婦幼專區', '私密保養',
                '草本品牌'
            ],
            [
                'GUCCI', 'Levis', 'G2000', 'PORTER', 'TUMI',
                'CASIO', 'CITIZEN星辰', '點睛品', 'Timberland', 'SKECHERS',
                'LANEW', '三花棉業', '曼黛瑪璉', '華歌爾', 'EASYSHOP',
                'Aimerfeel', 'ROXY', 'MUJI無印良品', '時尚熱搜榜', '精品包/配件',
                '瑞士錶/精品錶', '手錶', '專櫃行李箱', '行李箱', '旅行用品',
                '泳裝', '電腦包/商務包', '男包/皮夾'
            ]
        ];
        $prefix = [
            [
                'DGCA', 'DRAM', 'DRAN', 'DGBN', 'DRAO', 'DHAA', 'DSAA', 'DSAM', 'DSAU', 'DSAB',
                'DSBB', 'DRAF', 'DCAS', 'DRAH', 'DRAA', 'DRAB', 'DRAG', 'DRAI', 'DSAJ', 'DRAD',
                'DSAZ', 'DRAE', 'DRAC', 'DGAG', 'DGCD', 'DCAR', 'DCAX', 'DSAE', 'DCAF', 'DCAC',
                'DSAX', 'DSAW', 'DCBD', 'DSAF', 'DSBC', 'DSBE'
            ],
            [
                'DSAR', 'DCBF', 'DCBV', 'DCBH', 'DCAO', 'DCBU', 'DCAN', 'DCAH', 'DCAI', 'DCAY',
                'DCAJ', 'DCAD', 'DCAC', 'DSAO', 'DCBT', 'DCAK', 'DSAE', 'DCAL', 'DCAE', 'DCAW',
                'DCAF', 'DCAT', 'DCAV', 'DCBR', 'DCAP', 'DCBA', 'DECD', 'DCBB', 'DSAQ', 'DCAB'
            ],
            [
                'DHAZ', 'DHAA', 'DHAF', 'DHAE', 'DHAG', 'DHBF', 'DHAY', 'DHAI', 'DHAM', 'DYAJ',
                'DHAX', 'DHAD', 'DHAS', 'DHAK', 'DHAV', 'DHAC', 'DHAJ', 'DHBA', 'DHAB', 'DHBE',
                'DHAU', 'DHAT', 'DHAW', 'DHAR'
            ],
            [
                'DYAJ', 'DYAL', 'DYAB', 'DYAT', 'DYAN', 'DYAA', 'DYBF', 'DYBH', 'DYBM', 'DYBG',
                'DYBL', 'DYBK', 'DYBO', 'DYBP', 'DYBN', 'DYBQ', 'DYBY', 'DYBI', 'DYBJ', 'DYCF',
                'DYCG', 'DYAW', 'DYBB', 'DYAV', 'DYAY', 'DYAK', 'DYAM', 'DGAS', 'DYAX', 'DYAQ',
                'DYAI', 'DYAO', 'DYAU', 'DYAZ'
            ],
            [
                'DGBT', 'DGCM', 'DGCW', 'DGCV', 'DGCK', 'DGCN', 'DGCS', 'DGCT', 'DGCB', 'DGCL',
                'DYBF', 'DYBH', 'DYBM', 'DGBJ', 'DYAQ', 'DGCU', 'DYAI', 'DGCI', 'DGCO', 'DGAD',
                'DGBS', 'DGBQ', 'DGCH', 'DGBK', 'DGCF', 'DGBH', 'DGCR', 'DGAF'
            ],
            [
                'DMBF', 'DMBP', 'DPAM', 'DMBT', 'DPAK', 'DMBH', 'DMAC', 'DGCT', 'DMBO', 'DMBU',
                'DMBV', 'DMBS', 'DMBN', 'DMBC', 'DMBW', 'DYAN', 'DPAF', 'DPAD', 'DMAA', 'DPAI',
                'DPAC', 'DMAB', 'DMBQ', 'DMAU', 'DPAE', 'DMAX', 'DMBL', 'DMAH', 'DMAD', 'DMAY',
                'DMAG', 'DMBI', 'DMBJ', 'DMBR'
            ],
            [
                'DAAQ', 'DAAP', 'DABF', 'DABZ', 'DABY', 'DAAS', 'DABL', 'DABK', 'DABT', 'DXBP',
                'DAAG', 'DAAO', 'DAAB', 'DAAK', 'DAAZ', 'DAAA', 'DAAL', 'DAAJ', 'DAAM', 'DAAC',
                'DABE', 'DAAT', 'DAAU', 'DABH', 'DEAK', 'DEBV', 'DXBG', 'DXAM', 'DBAN', 'DAAY',
                'DABQ', 'DAAN', 'DIEG', 'DEDG'
            ],
            [
                'DEDJ', 'DWAA', 'DWAH', 'DWAJ', 'DWAC', 'DWAD', 'DWAE', 'DWAI', 'DWAF', 'DWAB',
                'DEAS', 'DEAE', 'DWAG', 'DAAO', 'DAAT', 'DBAD', 'DBCU', 'DBBJ', 'DDBG', 'DEAM',
                'DEEE', 'DECU', 'DEEG'
            ],
            [
                'DBEK', 'DBER', 'DBDS', 'DBCE', 'DBBS', 'DBCI', 'DBED', 'DBEE', 'DBCJ', 'DBEF',
                'DBCV', 'DBCP', 'DBCX', 'DBAR', 'DBCZ', 'DBCR', 'DBCY', 'DBAF', 'DBAE', 'DBAJ',
                'DBCO', 'DBAK', 'DBAB', 'DBAG', 'DBDZ', 'DBAC', 'DBAH', 'DBAL', 'DBDG', 'DBAT',
                'DBBJ', 'DBBY', 'DBAI'
            ],
            [
                'DEDK', 'DEDJ', 'DEAY', 'DEEN', 'DEBS', 'DECL', 'DEEI', 'DWAA', 'DECP', 'DXBV',
                'DEEF', 'DEEO', 'DEAW', 'DEAG', 'DECF', 'DEBM', 'DEBW', 'DEEL', 'DEAA', 'DWAC',
                'DWAD', 'DWAE', 'DWAF', 'DWAB', 'DEAT', 'DEBC', 'DEBT', 'DEBR', 'DEAS', 'DEAE',
                'DEAM', 'DEEE', 'DECU', 'DECB', 'DEDW', 'DEAZ', 'DBCR', 'DECJ'
            ],
            [
                'DQBA', 'DQBC', 'DQCF', 'DQAX', 'DQAY', 'DAAN', 'DQBF', 'DQBT', 'DQBM', 'DQBO',
                'DQBY', 'DQCG', 'DEEO', 'DQBE', 'DQBB', 'DQBD', 'DQAT', 'DQBS', 'DQBJ', 'DQAW',
                'DQAU', 'DQCC', 'DQCE', 'DQCB', 'DQBU', 'DQCD', 'DQBX', 'DQBL', 'DQBH', 'DQBK',
                'DQBR', 'DQBN', 'DQBP', 'DQBW'
            ],
            [
                'DXAG', 'DXAO', 'DXBX', 'DXAQ', 'DXBD', 'DXCB', 'DXBE', 'DXBN', 'DXCA', 'DXBQ',
                'DXBY', 'DXBW', 'DXBI', 'DXAL', 'DXBC', 'DEBQ', 'DXAU', 'DXBL', 'DXBK', 'DEAV',
                'DEAD', 'DEBB', 'DXBJ', 'DXAB', 'DEBY', 'DEAO', 'DEBN', 'DXAX'
            ],
            [
                'DFAD', 'DFAI', 'DBDF', 'DBCL', 'DFAH', 'DBBF', 'DBDH', 'DFAJ', 'DBDE', 'DFAF',
                'DBDN', 'DBDR', 'DFAN', 'DBCM', 'DBAZ', 'DFAG', 'DBBW', 'DFAU', 'DFAR', 'DBDP',
                'DBCQ', 'DFAE', 'DBDQ', 'DFAV', 'DFAS', 'DFAW', 'DFAY', 'DFAX', 'DFAO', 'DFAP',
                'DBAX', 'DBAU', 'DFAQ', 'DBCC', 'DBBC', 'DBBB', 'DBAD', 'DBAW', 'DBBZ', 'DBBA',
                'DAAH', 'DABC', 'DFAT'
            ],
            [
                'DDCZ', 'DDBQ', 'DDDQ', 'DDCO', 'DDCQ', 'DDDE', 'DDCX', 'DDCA', 'DDCF', 'DDBF',
                'DDCR', 'DDDJ', 'DDCU', 'DECC', 'DDBT', 'DDDG', 'DDCM', 'DDCN', 'DDCJ', 'DDDR',
                'DDAD', 'DDBH', 'DDAF', 'DDAB', 'DDCB', 'DDAI', 'DDAT', 'DDBX', 'DDCH', 'DDAH',
                'DDBZ', 'DDCC', 'DDBY', 'DDBG', 'DDDF', 'DDAO'
            ],
            [
                'DIEJ', 'DIEH', 'DIDX', 'DIBJ', 'DICW', 'DICH', 'DIEK', 'DIDU', 'DIDD', 'DIDT',
                'DIBZ', 'DIDI', 'DIDF', 'DIEB', 'DICZ', 'DIEE', 'DIDH', 'DEDK', 'DIBN', 'DICK',
                'DIDW', 'DIAC', 'DICY', 'DIBK', 'DICD', 'DICP', 'DICM', 'DIBM'
            ],
        ];

        for ($i = 0; $i < count($main_category); $i++) {
            for ($j = 0; $j < count($sub_category[$i]); $j++) {
                \App\Models\Category::insert([
                        'main_category' => $main_category[$i],
                        'sub_category' => $sub_category[$i][$j],
                        'prefix' => $prefix[$i][$j]
                    ]);
            }
        }
    }
}
