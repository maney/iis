<?php //netteCache[01]000216a:2:{s:4:"time";s:21:"0.93056400 1354112127";s:9:"callbacks";a:1:{i:0;a:3:{i:0;a:2:{i:0;s:5:"Cache";i:1;s:9:"checkFile";}i:1;s:61:"/www/sites/6/site13856/public_html/iis/app/config/config.neon";i:2;i:1354112105;}}}?><?php
// source: /www/sites/6/site13856/public_html/iis/app/config/config.neon production

/**
 * @property Application $application
 * @property Authenticator $authenticator
 * @property FileStorage $cacheStorage
 * @property DINestedAccessor $constants
 * @property DIContainer $container
 * @property Data $data
 * @property Connection $database
 * @property HttpRequest $httpRequest
 * @property HttpResponse $httpResponse
 * @property SystemContainer_nette $nette
 * @property DINestedAccessor $php
 * @property RouteList $router
 * @property Session $session
 * @property User $user
 */
class SystemContainer extends DIContainer
{

	public $classes = array(
		'object' => FALSE, //: nette.cacheJournal, cacheStorage, nette.httpRequestFactory, httpRequest, httpResponse, nette.httpContext, session, nette.userStorage, user, application, router, nette.mailer, nette.database, data, authenticator, container,
		'icachejournal' => 'nette.cacheJournal',
		'filejournal' => 'nette.cacheJournal',
		'icachestorage' => 'cacheStorage',
		'filestorage' => 'cacheStorage',
		'httprequestfactory' => 'nette.httpRequestFactory',
		'ihttprequest' => 'httpRequest',
		'httprequest' => 'httpRequest',
		'ihttpresponse' => 'httpResponse',
		'httpresponse' => 'httpResponse',
		'httpcontext' => 'nette.httpContext',
		'session' => 'session',
		'iuserstorage' => 'nette.userStorage',
		'userstorage' => 'nette.userStorage',
		'user' => 'user',
		'application' => 'application',
		'ipresenterfactory' => 'nette.presenterFactory',
		'presenterfactory' => 'nette.presenterFactory',
		'arraylist' => 'router',
		'traversable' => 'router',
		'iteratoraggregate' => 'router',
		'countable' => 'router',
		'arrayaccess' => 'router',
		'irouter' => 'router',
		'routelist' => 'router',
		'imailer' => 'nette.mailer',
		'sendmailmailer' => 'nette.mailer',
		'dinestedaccessor' => 'nette.database',
		'pdo' => 'nette.database.default',
		'connection' => 'nette.database.default',
		'data' => 'data',
		'iauthenticator' => 'authenticator',
		'authenticator' => 'authenticator',
		'freezableobject' => 'container',
		'ifreezable' => 'container',
		'idicontainer' => 'container',
		'dicontainer' => 'container',
	);

	public $meta = array();


	public function __construct()
	{
		parent::__construct(array(
			'appDir' => '/www/sites/6/site13856/public_html/iis/app',
			'wwwDir' => '/www/sites/6/site13856/public_html/iis/www',
			'debugMode' => FALSE,
			'productionMode' => TRUE,
			'environment' => 'production',
			'consoleMode' => FALSE,
			'container' => array(
				'class' => 'SystemContainer',
				'parent' => 'DIContainer',
			),
			'tempDir' => '/www/sites/6/site13856/public_html/iis/app/../temp',
			'database' => array(
				'driver' => 'mysql',
				'host' => 'localhost',
				'dbname' => 'czsem',
				'user' => 'czsem',
				'password' => 'czsem1',
			),
		));
	}


	/**
	 * @return Application
	 */
	protected function createServiceApplication()
	{
		$service = new Application($this->getService('nette.presenterFactory'), $this->getService('router'), $this->getService('httpRequest'), $this->getService('httpResponse'));
		$service->catchExceptions = TRUE;
		$service->errorPresenter = NULL;
		RoutingDebugger::initializePanel($service);
		return $service;
	}


	/**
	 * @return Authenticator
	 */
	protected function createServiceAuthenticator()
	{
		$service = new Authenticator($this->getService('database')->table('users'));
		return $service;
	}


	/**
	 * @return FileStorage
	 */
	protected function createServiceCacheStorage()
	{
		$service = new FileStorage('/www/sites/6/site13856/public_html/iis/app/../temp/cache', $this->getService('nette.cacheJournal'));
		return $service;
	}


	/**
	 * @return DINestedAccessor
	 */
	protected function createServiceConstants()
	{
		$service = new DINestedAccessor($this, 'constants');
		return $service;
	}


	/**
	 * @return DIContainer
	 */
	protected function createServiceContainer()
	{
		return $this;
	}


	/**
	 * @return Data
	 */
	protected function createServiceData()
	{
		$service = new Data($this->getService('database'));
		return $service;
	}


	/**
	 * @return Connection
	 */
	protected function createServiceDatabase()
	{
		$service = $this->getService('nette.database.default');
		return $service;
	}


	/**
	 * @return HttpRequest
	 */
	protected function createServiceHttpRequest()
	{
		$service = $this->getService('nette.httpRequestFactory')->createHttpRequest();
		if (!$service instanceof HttpRequest) {
			throw new UnexpectedValueException('Unable to create service \'httpRequest\', value returned by factory is not HttpRequest type.');
		}
		return $service;
	}


	/**
	 * @return HttpResponse
	 */
	protected function createServiceHttpResponse()
	{
		$service = new HttpResponse;
		return $service;
	}


	/**
	 * @return DINestedAccessor
	 */
	protected function createServiceNette()
	{
		$service = new DINestedAccessor($this, 'nette');
		return $service;
	}


	/**
	 * @return Form
	 */
	public function createNette__basicForm()
	{
		$service = new Form;
		return $service;
	}


	/**
	 * @return Callback
	 */
	protected function createServiceNette__basicFormFactory()
	{
		$service = new Callback($this, 'createNette__basicForm');
		return $service;
	}


	/**
	 * @return Cache
	 */
	public function createNette__cache($namespace = NULL)
	{
		$service = new Cache($this->getService('cacheStorage'), $namespace);
		return $service;
	}


	/**
	 * @return Callback
	 */
	protected function createServiceNette__cacheFactory()
	{
		$service = new Callback($this, 'createNette__cache');
		return $service;
	}


	/**
	 * @return FileJournal
	 */
	protected function createServiceNette__cacheJournal()
	{
		$service = new FileJournal('/www/sites/6/site13856/public_html/iis/app/../temp');
		return $service;
	}


	/**
	 * @return DINestedAccessor
	 */
	protected function createServiceNette__database()
	{
		$service = new DINestedAccessor($this, 'nette.database');
		return $service;
	}


	/**
	 * @return Connection
	 */
	protected function createServiceNette__database__default()
	{
		$service = new Connection('mysql:host=localhost;dbname=czsem', 'czsem', 'czsem1', NULL);
		$service->setCacheStorage($this->getService('cacheStorage'));
		Debugger::$blueScreen->addPanel('DatabasePanel::renderException');
		$service->setDatabaseReflection(new DiscoveredReflection($this->getService('cacheStorage')));
		return $service;
	}


	/**
	 * @return HttpContext
	 */
	protected function createServiceNette__httpContext()
	{
		$service = new HttpContext($this->getService('httpRequest'), $this->getService('httpResponse'));
		return $service;
	}


	/**
	 * @return HttpRequestFactory
	 */
	protected function createServiceNette__httpRequestFactory()
	{
		$service = new HttpRequestFactory;
		$service->setEncoding('UTF-8');
		return $service;
	}


	/**
	 * @return LatteFilter
	 */
	public function createNette__latte()
	{
		$service = new LatteFilter;
		return $service;
	}


	/**
	 * @return Callback
	 */
	protected function createServiceNette__latteFactory()
	{
		$service = new Callback($this, 'createNette__latte');
		return $service;
	}


	/**
	 * @return Mail
	 */
	public function createNette__mail()
	{
		$service = new Mail;
		$service->setMailer($this->getService('nette.mailer'));
		return $service;
	}


	/**
	 * @return Callback
	 */
	protected function createServiceNette__mailFactory()
	{
		$service = new Callback($this, 'createNette__mail');
		return $service;
	}


	/**
	 * @return SendmailMailer
	 */
	protected function createServiceNette__mailer()
	{
		$service = new SendmailMailer;
		return $service;
	}


	/**
	 * @return PresenterFactory
	 */
	protected function createServiceNette__presenterFactory()
	{
		$service = new PresenterFactory('/www/sites/6/site13856/public_html/iis/app', $this);
		return $service;
	}


	/**
	 * @return FileTemplate
	 */
	public function createNette__template()
	{
		$service = new FileTemplate;
		$service->registerFilter($this->createNette__latte());
		$service->registerHelperLoader('TemplateHelpers::loader');
		return $service;
	}


	/**
	 * @return PhpFileStorage
	 */
	protected function createServiceNette__templateCacheStorage()
	{
		$service = new PhpFileStorage('/www/sites/6/site13856/public_html/iis/app/../temp/cache', $this->getService('nette.cacheJournal'));
		return $service;
	}


	/**
	 * @return Callback
	 */
	protected function createServiceNette__templateFactory()
	{
		$service = new Callback($this, 'createNette__template');
		return $service;
	}


	/**
	 * @return UserStorage
	 */
	protected function createServiceNette__userStorage()
	{
		$service = new UserStorage($this->getService('session'));
		return $service;
	}


	/**
	 * @return DINestedAccessor
	 */
	protected function createServicePhp()
	{
		$service = new DINestedAccessor($this, 'php');
		return $service;
	}


	/**
	 * @return RouteList
	 */
	protected function createServiceRouter()
	{
		$service = new RouteList;
		return $service;
	}


	/**
	 * @return Session
	 */
	protected function createServiceSession()
	{
		$service = new Session($this->getService('httpRequest'), $this->getService('httpResponse'));
		$service->setExpiration('+ 14 days');
		return $service;
	}


	/**
	 * @return User
	 */
	protected function createServiceUser()
	{
		$service = new User($this->getService('nette.userStorage'), $this);
		return $service;
	}


	public function initialize()
	{
		date_default_timezone_set('Europe/Prague');
		FileStorage::$useDirectories = TRUE;

		$this->session->exists() && $this->session->start();
		header('X-Frame-Options: SAMEORIGIN');
	}

}



/**
 * @property Connection $default
 */
class SystemContainer_nette_database
{



}



/**
 * @method Form createBasicForm()
 * @property Callback $basicFormFactory
 * @method Cache createCache()
 * @property Callback $cacheFactory
 * @property FileJournal $cacheJournal
 * @property SystemContainer_nette_database $database
 * @property HttpContext $httpContext
 * @method LatteFilter createLatte()
 * @property Callback $latteFactory
 * @method Mail createMail()
 * @property Callback $mailFactory
 * @property SendmailMailer $mailer
 * @property PresenterFactory $presenterFactory
 * @method FileTemplate createTemplate()
 * @property PhpFileStorage $templateCacheStorage
 * @property Callback $templateFactory
 * @property UserStorage $userStorage
 */
class SystemContainer_nette
{



}
