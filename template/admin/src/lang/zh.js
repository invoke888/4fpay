export default {
  route: {
    index: '首页',
    // 订单管理
    orderList: '订单管理',
    inOrderList: '入款订单',
    outOrderList: '出款订单',
    // Configuration 配置管理
    Configuration: '配置管理',
    TripartiteList: '三方列表',
    changeTripart: '三方修改',
    addTripart: '三方新增',

    TripartIndex: '三方列表',
    addNotifyUrl: '通知地址新增',
    notifyUrl: '通知地址编辑',
    NotifyList: '通知地址',
    addNotify:'新增通知地址',

    payType: '支付方式',
    addPayType: '支付方式新增',
    ClientList: '客户接口',
    addClientList: '客户接口新增',
    AgentList: '代理列表',
    // 商户管理
    shopManage: '商户管理',
    incomeShop: '入款商户',
    outcomeShop: '出款商户',
    changeShop: '入款商户新增',
    addOutShop: '出款商户新增',
    // 银行列表
    bankManage: '银行列表',
    incomeBank: '入款银行',
    outcomeBank: '出款银行',
    addInComeBank: '入款银行新增',
    addOutComeBank: '出款银行新增',
    // 白名单管理
    whiteList: '白名单', //一级
    whiteIndex: '白名单管理',
    whiteAdd: '白名单添加',
    // 维护管理
    maintain: '维护管理', //一级
    maintainIndex: '维护管理',
    // 日志管理
    logSet: '日志管理',
    loginLog: '登陆日志',
    operateLog: '操作日志',
    dispatchLog: '下发日志',
    callbackLog: '回调日志',
    requestLog: '请求日志',
    orderLog: '订单日志',
    apiLogs: 'API日志',
    // 缓存管理
    cache: '缓存管理',
    cacheIndex: '缓存管理',
    // 权限管理
    permissionList: '权限管理', //一级
    accountSet: '账号管理',
    roleSet: '角色管理',
    permissionSet: '权限管理',
    menuSet: '菜单管理',
    accountAdd: '账号添加',
    roleAdd: '角色管理',
    errorLogsAdmin: '后台错误日志',
    errorLogsFront: '前台错误日志'

  },
  navbar: {
    logOut: '退出登录',
    screenfull: '全屏',
    Time: '当前时间',
    index: '首页'
  },
  login: {
    title: '系统登录',
    logIn: '登录',
    username: '账号',
    password: '密码',
    specialSymbol: '请不要输入特殊符号',
    verification: '验证码',
    correctVerification: '请输入验证码',
    notSame: '两次输入密码不一致!',
    sizeError: '请输入5到12位账号',
    passError: '密码格式错误(长度6-14，无空格)',
    passWeak: '密码强度弱，建议6到14位大小写字母数字组合',
  },
  valiMsg: {
    specialSymbol: '请不要输入特殊符号和空格',
    pathMsg: '请输入正确路由，例：path/login',
    getTypeMsg: '请选择获取方式',
    nickNameWeak: '名称长度在6~12个字符之间',
    accountMsg: '请输入由英文（至少1个）、数字、‘_’组成的4到8位的账号',
    roleMsg: '请选择角色',
    clientMsg: '请选择代理',
    menuIdsMsg: '请选择菜单',
    permIdsMsg: '请选择权限',
    payIdMsg: '请选择商户',
    IpMsg: '请输入正确的IP地址',
    urlMsg: '请输入正确的http地址',
    confName: '请输入商户名称',
    typeId: '请选择支付方式',
    typeName: '请输入支付方式',
    length12Msg: '内容控制在 12 个字符内',



    payCode: '支付code码由英文数字组成，格式为 “192-ac99”，多个时使用“,”分隔',
    payCodeMsg: '请输入code码',
    payCode_: 'code码由英文、数字、‘@’、‘_’组成',

    confName: '请输入商户名称，由中英文数字组成',
    confMod: '请输入模型名称，由英文组成',
    confModMsg: '模型名称由英文组成',
    dispensingUrl: '请输入合法的网络地址',
    url: '请输入合法的网络地址',
    agentId: '请输入代理，由中英文数字组成',
    agentIdMsg: '请输入代理',
    agentIp: '站点域名为空时，需要请输入代理IP',
    agentPort: '站点域名为空时，需要请输入代理端口',
    port: '请输入合法的端口，0 ~ 65535',
    callBackUrl: '代理IP和代理端口为空时，需要输入回调路由',
    siteUrl: '代理IP和代理端口为空时，需要输入站点域名',
    englishName: '请输入支付别名，由英文组成',
    englishNameMsg: '支付别名由英文组成',
    userId: '请输入客户ID，由数字组成',
    userIdMsg: '客户ID由数字组成',
    clientName: '请输入接口名称，由英文组成',
    clientNameMsg: '接口名称由英文组成',
    Secret: '请输入授权证书，由中英文数字组成',
    SecretMsg: '授权证书由中英文数字组成',
    clientUserId: '请选择代理',
    businessNum: '请输入商户ID',
    businessNumMsg: '商户ID不能输入中文',
    CodeMsg: '别皮好么',
    ChineseMsg: '请不要输入中文',
    msgOne: '请输入扩展字段',
    msgOneMsg: '请不要输入中文',
    spaceMsg: '请不要输入空格',
    uName: '请输入名称',
    msg: '请输入维护信息',
    regIpMsg: '请输入正确的IP地址，例如 192.168.0.1，多个IP用‘,’分割',
    slug: '请输入标识',
    label: '请输入名称',
    icon: '请选择图标',

    oldPass: '请输入原密码',
    mewPass: '请输入新密码',
    checkPass: '请输入确认密码',
    bankName: '请输入银行名称，多个时使用‘，’分隔',
    bankCode: '请输入银行编码，由英文组成，多个时使用‘，’分隔',
    bankCodeMsg: '银行编码由英文字母组成',
    payStop: '该商户已经停用，请选中别的商户'
  },
  alertMsg: {
    prompt: '提示',
    cancel: '关 闭',
    confirm: '确 定',
    toDelete: '是否继续删除?',
    toTripartite: '添加到维护列表?',
    cencelOperation: '取消',
    IllegalOperation: '非法操作',
    networkError: '网络错误',
    reLogin: '重新登陆',
    reLoginSuccess: '密码修改成功，请重新登陆',
    getCode: '请先获取验证码',
    changeLanguage: '切换语言成功',
    delMenu: '是否删除该菜单和子级菜单',
    delPerm: '否删除该权限和子级权限',
    toSend: '是否下发',
    changeTripartMsg: '非法进入，请点击三方列表的编辑再进入',
    orderLogMsg: '请输入订单号和日期'
  },
  index: {
    userMessage: '账号信息',
    account: '账号',
    nickname: '昵称',
    roles: '角色',
    lastLoginTime: '上次登陆时间',
    lastLoginIp: '上次登陆IP'
  },
  table: {
    latestWeek: '最近一周',
    lastMonth: '最近一个月',
    lastThreeMonths: '最近三个月',
    title: '标题',
    type: '类型',
    search: '搜索',
    input: '输入',
    page: '页码',
    date: '日期',
    time: '时间',
    author: '作者',
    status: '状态',
    actions: '操作',
    actionsTime: '操作时间',
    actionsIp: '操作IP',
    reset: '重置',

    APIName: 'API名称',
    APIPath: 'API路由',

    cancel: '关 闭',
    confirm: '确 定',
    pagenumber: '显示条数',
    number: '条数',
    account: '账号',
    ip: 'IP',
    port: '端口',

    stateChange: '状态修改',
    state1: '是否停用',
    state2: '是否启用',

    accountType: '账号类型',
    Pselect: '请选择',
    searchdata: '点击【搜索】获取数据',
    searchMsg: '给我一点时间',
    all: '全部',
    success: '成功',
    error: '失败',
    pending: '待处理',
    normal: '正常',
    disable: '停用',
    enable: '启用',
    formal: '正式',
    try: '试玩',
    roles: '角色',
    rolesName: '角色名称',
    permission: '权限',
    setPermission: '设置权限',
    selectPermission: '点击选择权限',
    getWayWeak: '请选择获取方式',
    reg: '注册',
    to: '至',
    start: '开始',
    end: '结束',
    money: '金额',
    theName: '姓名',
    password: '密码',
    repassword: '确认密码',
    editPassword: '修改密码',
    transaction: '交易额度',
    transactionHour: '交易时间',
    superior: '所属上级',
    reg_ip: 'IP',
    getWay: '获取方式',
    orderNumber: '订单号',
    clientOrderNumber: '线路订单号',
    platformOrderNumber: '平台订单号',
    proxy: '代理',
    proxyAccount: '代理账号',
    orders: '订单',
    source: '来源',
    content: '内容',
    roleID: '角色ID',
    message: '信息',
    address: '地址',
    searchUser: '搜索账号',
    searchName: '搜索昵称',
    id: 'ID',
    client: '线路',
    user: '账号',
    nickname: '昵称',
    Update: '编辑',
    create: '添加',
    details: '详情',
    delete: '删除',
    timestamp: '添加时间',
    editTimestamp: '修改时间',
    loginIp: '登陆IP',
    oldPass: '原密码',
    username: '用户名',
    pay: '支付',
    send: '下发',
    autoSend: '自动下发',
    manualSend: '手动补发',
    httpCode: 'http响应状态',
    sendMsg: '下发信息',
    returnMsg: '同步响应信息',
    searchId: '查询ID',
    agentId: '代理',
    agentIp: '代理IP',
    agentPort: '代理端口',
    agentNumber: '子代理线',
    payId: '三方类型',
    isApp: '是否跳转',
    merURL: '支付网关',
    md5Key: 'MD5秘钥',
    rsaKey: 'RSA私钥',
    publicKey: '公钥',
    callBackURL: '返回地址',

    //出入款
    businessNum: '商户ID',
    clientName: '线路',
    confName: '商户名称',
    payWay: '支付方式',
    payMoney: '订单金额',
    orderStatus: '订单状态',
    dispatchStatus: '下发状态',
    createdAt: '创建时间',
    updatedAt: '更新时间',
    agentName: '代理',
    extendData: '扩展资料一',
    owOrder: '代理订单',

    // 配置管理
    // 三方ID
    whiteListState: 'IP白名单',
    inSate: '是否入款',
    tripartPayID: '三方ID',
    tripartConfName: '三方名称',
    payMod: '模型名称',
    tripartPayCode: '三方扫码编码',
    typeName: '支付方式',
    ifNeedQuery: '是否开启查询',
    ifStatus: '开启通道',
    inState: '开启入款',
    outState: '开启出款',
    inComeBankList: '入款银行列表',
    payCode: '支付code码',
    yes: '是',
    no: '否',

    // 通知地址
    siteUrl: '站点域名',
    incomeCallbackUrl: '入款异步回调路由',
    outcomeCallbackUrl: '出款异步回调路由',

    // 支付方式
    whetherOpen: '是否开启',
    OpenAppH5: '开启App/H5',
    englishName: '支付别名',

    //客户接口
    portName: '接口名称',
    certificate: '授权证书',

    // 银行列表
    bankName: '银行名称',
    bankCode: '银行编码',
    bankStatus: '银行状态',

    // 维护管理
    maintainProg: '维护项目',
    whetherMaintain: '是否维护',
    maintainInfo: '维护信息',

    // 登陆日志
    loginMessage: '返回信息',
    loginClient: '线路',
    agent: '代理',
    loginClientName: '线路名称',
    name: '名称',

    // 操作日志
    userID: '用户ID',
    path: '路由',
    interaction: '交互方式',

    // 下发日志
    whetherSend: '是否自动下发',
    inOutcomeSend: '入款出款下发',
    data: '数据',
    httpCode: 'http 响应码',
    reponseMessage: '响应信息',
    auto: '自动',
    manual: '手动',
    income: '入款',
    outcome: '出款',
    check: '查看',

    //回调日志
    callback: '回调',
    errorType: '错误类型',
    callbackUrl: '回调地址',
    refresh: '刷新',
    filter: '筛选',
    add: '新增',
    submit: '提交',

    paySuccess: '支付成功',
    payFail: '支付失败',
    notPay: '未支付',

    //请求日志
    req_clientName:'平台线路',
    req_aim:'请求目的',
    req_ip: '请求IP地址',
    req_route:'请求的路由',
    req_data:'请求的数据',
    req_time:'请求的时间',


    // 角色管理
    identify: '标识',
    level: '级别',
    open: '展开',
    shut: '关闭',
    icons: '图标选择',
    prompt: '提示',
    setMenu: '设置菜单',
    setPerm: '设置权限',
    'undefined': '',
    gradeTopMenu: '顶级菜单',
    gradeTopPerm: '顶级权限',
    Ip: 'IP',
    key: '一键登录KEY',
    permLv: '权限级别',
    clientTree: '代理',
    whiteListIp: '白名单IP',

    isClient: '代理下拉',
    isAgent: '线路下拉',

    source: '源',
    aims: '目标',
    goLeft: '到左边',
    goRight: '到右边',
    errorCode: '错误信息',
    maintain: '维护',
    orderStatistics: '订单统计',
    totalNum: '订单总笔数',
    totalFee: '订单总金额',
    successNum: '成功订单笔数',
    successFee: '成功订单总金额',
    remarkName: '备注',
    clientID: '客户ID',
    msg404_1: '请检查您输入的网址是否正确，请点击以下按钮返回主页',
    reLogin: '重新登陆',
    goIndex: '返回首页',
    msg401_1: '如有不满请联系你领导',
    msg401_2: '你没有权限去该页面',
    back: '返回',
    codeList: 'code码列表'
  },
  callback: {
    clientID: '客户端ID',
    clientName: '客户端名称'
  },
  menu: {
    root: '父级菜单',
    title: '标题',
    icon: '图标',
    path: '路由',
    role: '角色',
    identify: '标识',
    getType: '获取方式',
    menuTitle: '菜单名称',
    permName: '权限名称',
    fatherPerm: '父级权限',
    name: '名称'
  },
  tagsView: {
    open: '开启',
    close: '关闭',
    closeOthers: '关闭其它',
    closeAll: '关闭所有',
    back: '返回'
  },
  payName: {
    bank: '网银',
    wechat: '微信',
    alipay: '支付宝',
    qqpay: 'QQ钱包',
    tenpay: '财付通',
    visapay: '银联扫码',
    jdpay: '京东钱包',
    bdpay: '百度钱包',
    ylpay: '银联快捷',
    cardpay: '点卡',
    allpay: '一码付',
    dispensing: '自动出款',
    extendName: '扩展字段名称',
  },
  statusMsg: {
    1: '正常',
    2: '停用'
  },
  getWay: {
    GET: '获取',
    POST: '添加',
    PUT: '修改',
    DELETE: '删除'
  },
  maintain: {
    all: '全部',
    1: '开启',
    2: '关闭'
  },
  maintainProg: {
    1: "api",
    2: "后台",
    3: "单通道"
  },
  changeIsSued: {
    1: "验证错误",
    2: "IP黑名单",
    3: "入款失败",
    4: '回调地址错误',
    5: '无此订单',
    6: '金额不匹配',
    7: '其他'
  },
  switchMsg: {
    open: {
      1: '是否关闭',
      2: '是否开启'
    },
    deposit: {
      1: '是否关闭入款',
      2: '是否开启入款'
    },
    dispensing: {
      1: '是否关闭出款',
      2: '是否开启出款'
    },
    jump: {
      1: '是否关闭跳转',
      2: '是否开启跳转'
    },
    stop: {
      1: '是否停用',
      2: '是否启用'
    },
    whiteList: {
      1: '是否关闭白名单',
      2: '是否开启白名单'
    },
    maintain: {
      1: '是否关闭维护',
      2: '是否开启维护'
    }
  }
}
