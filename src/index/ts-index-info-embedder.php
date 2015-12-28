



<!DOCTYPE html>
<html lang="en" class=" is-copy-enabled is-u2f-enabled">
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# object: http://ogp.me/ns/object# article: http://ogp.me/ns/article# profile: http://ogp.me/ns/profile#">
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta name="viewport" content="width=1020">
    
    
    <title>dzslides/embedder.html at master · paulrouget/dzslides</title>
    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="GitHub">
    <link rel="fluid-icon" href="https://github.com/fluidicon.png" title="GitHub">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-114.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-144.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144.png">
    <meta property="fb:app_id" content="1401488693436528">

      <meta content="@github" name="twitter:site" /><meta content="summary" name="twitter:card" /><meta content="paulrouget/dzslides" name="twitter:title" /><meta content="dzslides - DZSlides is a one-file HTML template to build slides in HTML5 and CSS3." name="twitter:description" /><meta content="https://avatars0.githubusercontent.com/u/373579?v=3&amp;s=400" name="twitter:image:src" />
      <meta content="GitHub" property="og:site_name" /><meta content="object" property="og:type" /><meta content="https://avatars0.githubusercontent.com/u/373579?v=3&amp;s=400" property="og:image" /><meta content="paulrouget/dzslides" property="og:title" /><meta content="https://github.com/paulrouget/dzslides" property="og:url" /><meta content="dzslides - DZSlides is a one-file HTML template to build slides in HTML5 and CSS3." property="og:description" />
      <meta name="browser-stats-url" content="https://api.github.com/_private/browser/stats">
    <meta name="browser-errors-url" content="https://api.github.com/_private/browser/errors">
    <link rel="assets" href="https://assets-cdn.github.com/">
    <link rel="web-socket" href="wss://live.github.com/_sockets/MTg4Njg0NDowODEyMmQ4OTlkZGNlMDQ3OTE1YjNhM2VjNzc4N2QxZDo1MDFhYzBlNTY0NjZjMjgyMzlkZmJkMzM4ZWUyNTIxMmE3ODM5ODYxMTRhNTNjYjA2NzBiMjhlZTU2NTFkMWI5--246cff85e5e288a0d83dd1c6e69dcdffe4c0fedd">
    <meta name="pjax-timeout" content="1000">
    <link rel="sudo-modal" href="/sessions/sudo_modal">

    <meta name="msapplication-TileImage" content="/windows-tile.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="selected-link" value="repo_source" data-pjax-transient>

    <meta name="google-site-verification" content="KT5gs8h0wvaagLKAVWq8bbeNwnZZK1r1XQysX3xurLU">
    <meta name="google-analytics" content="UA-3769691-2">

<meta content="collector.githubapp.com" name="octolytics-host" /><meta content="github" name="octolytics-app-id" /><meta content="B1B6A166:4486:9F9F04C:5677FF92" name="octolytics-dimension-request_id" /><meta content="1886844" name="octolytics-actor-id" /><meta content="betobyte" name="octolytics-actor-login" /><meta content="cedb7c44bd282899ece56fc6b8cc0d12fddd0fe411acf61c7412648fbb4b083c" name="octolytics-actor-hash" />
<meta content="/&lt;user-name&gt;/&lt;repo-name&gt;/blob/show" data-pjax-transient="true" name="analytics-location" />
<meta content="Rails, view, blob#show" data-pjax-transient="true" name="analytics-event" />


  <meta class="js-ga-set" name="dimension1" content="Logged In">



        <meta name="hostname" content="github.com">
    <meta name="user-login" content="betobyte">

        <meta name="expected-hostname" content="github.com">

      <link rel="mask-icon" href="https://assets-cdn.github.com/pinned-octocat.svg" color="#4078c0">
      <link rel="icon" type="image/x-icon" href="https://assets-cdn.github.com/favicon.ico">

    <meta content="9106897a9800a0dac68600731a49dd04473e8b1d" name="form-nonce" />

    <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/github-2cf579a6b28dd247fe7895e0539371525ae8c3bf4e52e45e893bb6b09ee597df.css" integrity="sha256-LPV5prKN0kf+eJXgU5NxUlrow79OUuReiTu2sJ7ll98=" media="all" rel="stylesheet" />
    <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/github2-4280061368be57917309c32e14e922e1b4575c8e586c5aa9f6feeb11280c7a2f.css" integrity="sha256-QoAGE2i+V5FzCcMuFOki4bRXXI5YbFqp9v7rESgMei8=" media="all" rel="stylesheet" />
    
    


    <meta http-equiv="x-pjax-version" content="e884612b86c6e4ec31651647e12e417b">

      
  <meta name="description" content="dzslides - DZSlides is a one-file HTML template to build slides in HTML5 and CSS3.">
  <meta name="go-import" content="github.com/paulrouget/dzslides git https://github.com/paulrouget/dzslides.git">

  <meta content="373579" name="octolytics-dimension-user_id" /><meta content="paulrouget" name="octolytics-dimension-user_login" /><meta content="1627325" name="octolytics-dimension-repository_id" /><meta content="paulrouget/dzslides" name="octolytics-dimension-repository_nwo" /><meta content="true" name="octolytics-dimension-repository_public" /><meta content="false" name="octolytics-dimension-repository_is_fork" /><meta content="1627325" name="octolytics-dimension-repository_network_root_id" /><meta content="paulrouget/dzslides" name="octolytics-dimension-repository_network_root_nwo" />
  <link href="https://github.com/paulrouget/dzslides/commits/master.atom" rel="alternate" title="Recent Commits to dzslides:master" type="application/atom+xml">

  </head>


  <body class="logged_in   env-production windows vis-public page-blob">
    <a href="#start-of-content" tabindex="1" class="accessibility-aid js-skip-to-content">Skip to content</a>

    
    
    



      <div class="header header-logged-in true" role="banner">
  <div class="container clearfix">

    <a class="header-logo-invertocat" href="https://github.com/" data-hotkey="g d" aria-label="Homepage" data-ga-click="Header, go to dashboard, icon:logo">
  <span class="mega-octicon octicon-mark-github "></span>
</a>


      <div class="site-search repo-scope js-site-search" role="search">
          <!-- </textarea> --><!-- '"` --><form accept-charset="UTF-8" action="/paulrouget/dzslides/search" class="js-site-search-form" data-global-search-url="/search" data-repo-search-url="/paulrouget/dzslides/search" method="get"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
  <label class="js-chromeless-input-container form-control">
    <div class="scope-badge">This repository</div>
    <input type="text"
      class="js-site-search-focus js-site-search-field is-clearable chromeless-input"
      data-hotkey="s"
      name="q"
      placeholder="Search"
      aria-label="Search this repository"
      data-global-scope-placeholder="Search GitHub"
      data-repo-scope-placeholder="Search"
      tabindex="1"
      autocapitalize="off">
  </label>
</form>
      </div>

      <ul class="header-nav left" role="navigation">
        <li class="header-nav-item">
          <a href="/pulls" class="js-selected-navigation-item header-nav-link" data-ga-click="Header, click, Nav menu - item:pulls context:user" data-hotkey="g p" data-selected-links="/pulls /pulls/assigned /pulls/mentioned /pulls">
            Pull requests
</a>        </li>
        <li class="header-nav-item">
          <a href="/issues" class="js-selected-navigation-item header-nav-link" data-ga-click="Header, click, Nav menu - item:issues context:user" data-hotkey="g i" data-selected-links="/issues /issues/assigned /issues/mentioned /issues">
            Issues
</a>        </li>
          <li class="header-nav-item">
            <a class="header-nav-link" href="https://gist.github.com/" data-ga-click="Header, go to gist, text:gist">Gist</a>
          </li>
      </ul>

    
<ul class="header-nav user-nav right" id="user-links">
  <li class="header-nav-item">
      <span class="js-socket-channel js-updatable-content"
        data-channel="notification-changed:betobyte"
        data-url="/notifications/header">
      <a href="/notifications" aria-label="You have no unread notifications" class="header-nav-link notification-indicator tooltipped tooltipped-s" data-ga-click="Header, go to notifications, icon:read" data-hotkey="g n">
          <span class="mail-status all-read"></span>
          <span class="octicon octicon-bell "></span>
</a>  </span>

  </li>

  <li class="header-nav-item dropdown js-menu-container">
    <a class="header-nav-link tooltipped tooltipped-s js-menu-target" href="/new"
       aria-label="Create new…"
       data-ga-click="Header, create new, icon:add">
      <span class="octicon octicon-plus left"></span>
      <span class="dropdown-caret"></span>
    </a>

    <div class="dropdown-menu-content js-menu-content">
      <ul class="dropdown-menu dropdown-menu-sw">
        
<a class="dropdown-item" href="/new" data-ga-click="Header, create new repository">
  New repository
</a>


  <a class="dropdown-item" href="/organizations/new" data-ga-click="Header, create new organization">
    New organization
  </a>



  <div class="dropdown-divider"></div>
  <div class="dropdown-header">
    <span title="paulrouget/dzslides">This repository</span>
  </div>
    <a class="dropdown-item" href="/paulrouget/dzslides/issues/new" data-ga-click="Header, create new issue">
      New issue
    </a>

      </ul>
    </div>
  </li>

  <li class="header-nav-item dropdown js-menu-container">
    <a class="header-nav-link name tooltipped tooltipped-sw js-menu-target" href="/betobyte"
       aria-label="View profile and more"
       data-ga-click="Header, show menu, icon:avatar">
      <img alt="@betobyte" class="avatar" height="20" src="https://avatars0.githubusercontent.com/u/1886844?v=3&amp;s=40" width="20" />
      <span class="dropdown-caret"></span>
    </a>

    <div class="dropdown-menu-content js-menu-content">
      <div class="dropdown-menu  dropdown-menu-sw">
        <div class=" dropdown-header header-nav-current-user css-truncate">
            Signed in as <strong class="css-truncate-target">betobyte</strong>

        </div>


        <div class="dropdown-divider"></div>

          <a class="dropdown-item" href="/betobyte" data-ga-click="Header, go to profile, text:your profile">
            Your profile
          </a>
        <a class="dropdown-item" href="/stars" data-ga-click="Header, go to starred repos, text:your stars">
          Your stars
        </a>
        <a class="dropdown-item" href="/explore" data-ga-click="Header, go to explore, text:explore">
          Explore
        </a>
          <a class="dropdown-item" href="/integrations" data-ga-click="Header, go to integrations, text:integrations">
            Integrations
          </a>
        <a class="dropdown-item" href="https://help.github.com" data-ga-click="Header, go to help, text:help">
          Help
        </a>

          <div class="dropdown-divider"></div>

          <a class="dropdown-item" href="/settings/profile" data-ga-click="Header, go to settings, icon:settings">
            Settings
          </a>

          <!-- </textarea> --><!-- '"` --><form accept-charset="UTF-8" action="/logout" class="logout-form" data-form-nonce="9106897a9800a0dac68600731a49dd04473e8b1d" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="om1u9izcAto+UuiZngAcKD0bLel45HTfMnMRGtiJ9XRYlnDLSO6AssYnAQUQv90TYD0zk+fJax5AX3S6TiaUBA==" /></div>
            <button class="dropdown-item dropdown-signout" data-ga-click="Header, sign out, icon:logout">
              Sign out
            </button>
</form>
      </div>
    </div>
  </li>
</ul>


    
  </div>
</div>

      

      


    <div id="start-of-content" class="accessibility-aid"></div>

      <div id="js-flash-container">
</div>


    <div role="main" class="main-content">
        <div itemscope itemtype="http://schema.org/WebPage">
    <div id="js-repo-pjax-container" class="context-loader-container js-repo-nav-next" data-pjax-container>
      
<div class="pagehead repohead instapaper_ignore readability-menu experiment-repo-nav">
  <div class="container repohead-details-container">

    

<ul class="pagehead-actions">

  <li>
        <!-- </textarea> --><!-- '"` --><form accept-charset="UTF-8" action="/notifications/subscribe" class="js-social-container" data-autosubmit="true" data-form-nonce="9106897a9800a0dac68600731a49dd04473e8b1d" data-remote="true" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="N+h9mZsrDenc9eV19fcnw6ISS3cJ6vFCLhq5RizbBmrbJEmGBZatlQdKxc3qUjqWiCMYAU7YW/mg+2KBQ0wwlA==" /></div>      <input id="repository_id" name="repository_id" type="hidden" value="1627325" />

        <div class="select-menu js-menu-container js-select-menu">
          <a href="/paulrouget/dzslides/subscription"
            class="btn btn-sm btn-with-count select-menu-button js-menu-target" role="button" tabindex="0" aria-haspopup="true"
            data-ga-click="Repository, click Watch settings, action:blob#show">
            <span class="js-select-button">
              <span class="octicon octicon-eye "></span>
              Watch
            </span>
          </a>
          <a class="social-count js-social-count" href="/paulrouget/dzslides/watchers">
            41
          </a>

        <div class="select-menu-modal-holder">
          <div class="select-menu-modal subscription-menu-modal js-menu-content" aria-hidden="true">
            <div class="select-menu-header">
              <span aria-label="Close" class="octicon octicon-x js-menu-close" role="button"></span>
              <span class="select-menu-title">Notifications</span>
            </div>

              <div class="select-menu-list js-navigation-container" role="menu">

                <div class="select-menu-item js-navigation-item selected" role="menuitem" tabindex="0">
                  <span class="select-menu-item-icon octicon octicon-check"></span>
                  <div class="select-menu-item-text">
                    <input checked="checked" id="do_included" name="do" type="radio" value="included" />
                    <span class="select-menu-item-heading">Not watching</span>
                    <span class="description">Be notified when participating or @mentioned.</span>
                    <span class="js-select-button-text hidden-select-button-text">
                      <span class="octicon octicon-eye"></span>
                      Watch
                    </span>
                  </div>
                </div>

                <div class="select-menu-item js-navigation-item " role="menuitem" tabindex="0">
                  <span class="select-menu-item-icon octicon octicon octicon-check"></span>
                  <div class="select-menu-item-text">
                    <input id="do_subscribed" name="do" type="radio" value="subscribed" />
                    <span class="select-menu-item-heading">Watching</span>
                    <span class="description">Be notified of all conversations.</span>
                    <span class="js-select-button-text hidden-select-button-text">
                      <span class="octicon octicon-eye"></span>
                      Unwatch
                    </span>
                  </div>
                </div>

                <div class="select-menu-item js-navigation-item " role="menuitem" tabindex="0">
                  <span class="select-menu-item-icon octicon octicon-check"></span>
                  <div class="select-menu-item-text">
                    <input id="do_ignore" name="do" type="radio" value="ignore" />
                    <span class="select-menu-item-heading">Ignoring</span>
                    <span class="description">Never be notified.</span>
                    <span class="js-select-button-text hidden-select-button-text">
                      <span class="octicon octicon-mute"></span>
                      Stop ignoring
                    </span>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>
</form>
  </li>

  <li>
    
  <div class="js-toggler-container js-social-container starring-container ">

    <!-- </textarea> --><!-- '"` --><form accept-charset="UTF-8" action="/paulrouget/dzslides/unstar" class="js-toggler-form starred js-unstar-button" data-form-nonce="9106897a9800a0dac68600731a49dd04473e8b1d" data-remote="true" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="AIbKTpJci2bVKnE4c6Iqi9CTIe7Hh7RCNqPcgckNbNXXYyJgcar933ZNTV5oFyZK07fl7SW7Jp/mfRBC7ZzpCA==" /></div>
      <button
        class="btn btn-sm btn-with-count js-toggler-target"
        aria-label="Unstar this repository" title="Unstar paulrouget/dzslides"
        data-ga-click="Repository, click unstar button, action:blob#show; text:Unstar">
        <span class="octicon octicon-star "></span>
        Unstar
      </button>
        <a class="social-count js-social-count" href="/paulrouget/dzslides/stargazers">
          767
        </a>
</form>
    <!-- </textarea> --><!-- '"` --><form accept-charset="UTF-8" action="/paulrouget/dzslides/star" class="js-toggler-form unstarred js-star-button" data-form-nonce="9106897a9800a0dac68600731a49dd04473e8b1d" data-remote="true" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="6u6Je1Sy1Kn3dMd5Q1Uuky3p9zI0Pl+MiJrRU9Y9LJ2WM5ZI+Gn4EL7BAA3AodFMdNzvggCWyFBq87HVUN0bBw==" /></div>
      <button
        class="btn btn-sm btn-with-count js-toggler-target"
        aria-label="Star this repository" title="Star paulrouget/dzslides"
        data-ga-click="Repository, click star button, action:blob#show; text:Star">
        <span class="octicon octicon-star "></span>
        Star
      </button>
        <a class="social-count js-social-count" href="/paulrouget/dzslides/stargazers">
          767
        </a>
</form>  </div>

  </li>

  <li>
          <a href="#fork-destination-box" class="btn btn-sm btn-with-count"
              title="Fork your own copy of paulrouget/dzslides to your account"
              aria-label="Fork your own copy of paulrouget/dzslides to your account"
              rel="facebox"
              data-ga-click="Repository, show fork modal, action:blob#show; text:Fork">
              <span class="octicon octicon-repo-forked "></span>
            Fork
          </a>

          <div id="fork-destination-box" style="display: none;">
            <h2 class="facebox-header" data-facebox-id="facebox-header">Where should we fork this repository?</h2>
            <include-fragment src=""
                class="js-fork-select-fragment fork-select-fragment"
                data-url="/paulrouget/dzslides/fork?fragment=1">
              <img alt="Loading" height="64" src="https://assets-cdn.github.com/images/spinners/octocat-spinner-128.gif" width="64" />
            </include-fragment>
          </div>

    <a href="/paulrouget/dzslides/network" class="social-count">
      227
    </a>
  </li>
</ul>

    <h1 itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="entry-title public ">
  <span class="octicon octicon-repo "></span>
  <span class="author"><a href="/paulrouget" class="url fn" itemprop="url" rel="author"><span itemprop="title">paulrouget</span></a></span><!--
--><span class="path-divider">/</span><!--
--><strong><a href="/paulrouget/dzslides" data-pjax="#js-repo-pjax-container">dzslides</a></strong>

  <span class="page-context-loader">
    <img alt="" height="16" src="https://assets-cdn.github.com/images/spinners/octocat-spinner-32.gif" width="16" />
  </span>

</h1>

  </div>
  <div class="container">
    
<nav class="reponav js-repo-nav js-sidenav-container-pjax js-octicon-loaders"
     role="navigation"
     data-pjax="#js-repo-pjax-container">

  <a href="/paulrouget/dzslides" aria-label="Code" aria-selected="true" class="js-selected-navigation-item selected reponav-item" data-hotkey="g c" data-selected-links="repo_source repo_downloads repo_commits repo_releases repo_tags repo_branches /paulrouget/dzslides">
    <span class="octicon octicon-code "></span>
    Code
</a>
    <a href="/paulrouget/dzslides/issues" class="js-selected-navigation-item reponav-item" data-hotkey="g i" data-selected-links="repo_issues repo_labels repo_milestones /paulrouget/dzslides/issues">
      <span class="octicon octicon-issue-opened "></span>
      Issues
      <span class="counter">21</span>
</a>
  <a href="/paulrouget/dzslides/pulls" class="js-selected-navigation-item reponav-item" data-hotkey="g p" data-selected-links="repo_pulls /paulrouget/dzslides/pulls">
    <span class="octicon octicon-git-pull-request "></span>
    Pull requests
    <span class="counter">5</span>
</a>
    <a href="/paulrouget/dzslides/wiki" class="js-selected-navigation-item reponav-item" data-hotkey="g w" data-selected-links="repo_wiki /paulrouget/dzslides/wiki">
      <span class="octicon octicon-book "></span>
      Wiki
</a>
  <a href="/paulrouget/dzslides/pulse" class="js-selected-navigation-item reponav-item" data-selected-links="pulse /paulrouget/dzslides/pulse">
    <span class="octicon octicon-pulse "></span>
    Pulse
</a>
  <a href="/paulrouget/dzslides/graphs" class="js-selected-navigation-item reponav-item" data-selected-links="repo_graphs repo_contributors /paulrouget/dzslides/graphs">
    <span class="octicon octicon-graph "></span>
    Graphs
</a>

</nav>

  </div>
</div>

<div class="container new-discussion-timeline experiment-repo-nav">
  <div class="repository-content">

    

<a href="/paulrouget/dzslides/blob/fdcd6727a7ebd08520ad11656e6bfd0d0d6a1e0a/shells/embedder.html" class="hidden js-permalink-shortcut" data-hotkey="y">Permalink</a>

<!-- blob contrib key: blob_contributors:v21:9500e1803338d0dc7805d8dfb29d0765 -->

<div class="file-navigation js-zeroclipboard-container">
  
<div class="select-menu js-menu-container js-select-menu left">
  <button class="btn btn-sm select-menu-button js-menu-target css-truncate" data-hotkey="w"
    title="master"
    type="button" aria-label="Switch branches or tags" tabindex="0" aria-haspopup="true">
    <i>Branch:</i>
    <span class="js-select-button css-truncate-target">master</span>
  </button>

  <div class="select-menu-modal-holder js-menu-content js-navigation-container" data-pjax aria-hidden="true">

    <div class="select-menu-modal">
      <div class="select-menu-header">
        <span aria-label="Close" class="octicon octicon-x js-menu-close" role="button"></span>
        <span class="select-menu-title">Switch branches/tags</span>
      </div>

      <div class="select-menu-filters">
        <div class="select-menu-text-filter">
          <input type="text" aria-label="Filter branches/tags" id="context-commitish-filter-field" class="js-filterable-field js-navigation-enable" placeholder="Filter branches/tags">
        </div>
        <div class="select-menu-tabs">
          <ul>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="branches" data-filter-placeholder="Filter branches/tags" class="js-select-menu-tab" role="tab">Branches</a>
            </li>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="tags" data-filter-placeholder="Find a tag…" class="js-select-menu-tab" role="tab">Tags</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="branches" role="menu">

        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/box-sizing/shells/embedder.html"
               data-name="box-sizing"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="box-sizing">
                box-sizing
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/code-cleanup/shells/embedder.html"
               data-name="code-cleanup"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="code-cleanup">
                code-cleanup
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/content-update/shells/embedder.html"
               data-name="content-update"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="content-update">
                content-update
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/doc-and-stuff/shells/embedder.html"
               data-name="doc-and-stuff"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="doc-and-stuff">
                doc-and-stuff
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/embedder-style/shells/embedder.html"
               data-name="embedder-style"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="embedder-style">
                embedder-style
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/figure/shells/embedder.html"
               data-name="figure"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="figure">
                figure
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/fullscreen/shells/embedder.html"
               data-name="fullscreen"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="fullscreen">
                fullscreen
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/gh-pages/shells/embedder.html"
               data-name="gh-pages"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="gh-pages">
                gh-pages
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/hidden-controls/shells/embedder.html"
               data-name="hidden-controls"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="hidden-controls">
                hidden-controls
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/incremental/shells/embedder.html"
               data-name="incremental"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="incremental">
                incremental
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open selected"
               href="/paulrouget/dzslides/blob/master/shells/embedder.html"
               data-name="master"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="master">
                master
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/new-default-content/shells/embedder.html"
               data-name="new-default-content"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="new-default-content">
                new-default-content
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/onstage-incremental-cursor/shells/embedder.html"
               data-name="onstage-incremental-cursor"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="onstage-incremental-cursor">
                onstage-incremental-cursor
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/opera/shells/embedder.html"
               data-name="opera"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="opera">
                opera
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/parameters/shells/embedder.html"
               data-name="parameters"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="parameters">
                parameters
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/progress-bar/shells/embedder.html"
               data-name="progress-bar"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="progress-bar">
                progress-bar
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/progressbar-style/shells/embedder.html"
               data-name="progressbar-style"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="progressbar-style">
                progressbar-style
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/q-vs-blockquote/shells/embedder.html"
               data-name="q-vs-blockquote"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="q-vs-blockquote">
                q-vs-blockquote
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/remove-copying/shells/embedder.html"
               data-name="remove-copying"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="remove-copying">
                remove-copying
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/scrollintoview-outline/shells/embedder.html"
               data-name="scrollintoview-outline"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="scrollintoview-outline">
                scrollintoview-outline
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/video-controls/shells/embedder.html"
               data-name="video-controls"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="video-controls">
                video-controls
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
               href="/paulrouget/dzslides/blob/view-mode/shells/embedder.html"
               data-name="view-mode"
               data-skip-pjax="true"
               rel="nofollow">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <span class="select-menu-item-text css-truncate-target" title="view-mode">
                view-mode
              </span>
            </a>
        </div>

          <div class="select-menu-no-results">Nothing to show</div>
      </div>

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="tags">
        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


        </div>

        <div class="select-menu-no-results">Nothing to show</div>
      </div>

    </div>
  </div>
</div>

  <div class="btn-group right">
    <a href="/paulrouget/dzslides/find/master"
          class="js-show-file-finder btn btn-sm"
          data-pjax
          data-hotkey="t">
      Find file
    </a>
    <button aria-label="Copy file path to clipboard" class="js-zeroclipboard btn btn-sm zeroclipboard-button tooltipped tooltipped-s" data-copied-hint="Copied!" type="button">Copy path</button>
  </div>
  <div class="breadcrumb js-zeroclipboard-target">
    <span class="repo-root js-repo-root"><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/paulrouget/dzslides" class="" data-branch="master" data-pjax="true" itemscope="url"><span itemprop="title">dzslides</span></a></span></span><span class="separator">/</span><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/paulrouget/dzslides/tree/master/shells" class="" data-branch="master" data-pjax="true" itemscope="url"><span itemprop="title">shells</span></a></span><span class="separator">/</span><strong class="final-path">embedder.html</strong>
  </div>
</div>


  <div class="commit-tease">
      <span class="right">
        <a class="commit-tease-sha" href="/paulrouget/dzslides/commit/c4217b42025f5fb80ce12c90f1bb6ee5de495959" data-pjax>
          c4217b4
        </a>
        <time datetime="2012-03-08T18:15:45Z" is="relative-time">Mar 8, 2012</time>
      </span>
      <div>
        <img alt="@hsablonniere" class="avatar" height="20" src="https://avatars0.githubusercontent.com/u/236342?v=3&amp;s=40" width="20" />
        <a href="/hsablonniere" class="user-mention" rel="contributor">hsablonniere</a>
          <a href="/paulrouget/dzslides/commit/c4217b42025f5fb80ce12c90f1bb6ee5de495959" class="message" data-pjax="true" title="Removing the extra title on top of embedder">Removing the extra title on top of embedder</a>
      </div>

    <div class="commit-tease-contributors">
      <a class="muted-link contributors-toggle" href="#blob_contributors_box" rel="facebox">
        <strong>3</strong>
         contributors
      </a>
          <a class="avatar-link tooltipped tooltipped-s" aria-label="hsablonniere" href="/paulrouget/dzslides/commits/master/shells/embedder.html?author=hsablonniere"><img alt="@hsablonniere" class="avatar" height="20" src="https://avatars0.githubusercontent.com/u/236342?v=3&amp;s=40" width="20" /> </a>
    <a class="avatar-link tooltipped tooltipped-s" aria-label="mstalfoort" href="/paulrouget/dzslides/commits/master/shells/embedder.html?author=mstalfoort"><img alt="@mstalfoort" class="avatar" height="20" src="https://avatars3.githubusercontent.com/u/496796?v=3&amp;s=40" width="20" /> </a>
    <a class="avatar-link tooltipped tooltipped-s" aria-label="skattyadz" href="/paulrouget/dzslides/commits/master/shells/embedder.html?author=skattyadz"><img alt="@skattyadz" class="avatar" height="20" src="https://avatars0.githubusercontent.com/u/91115?v=3&amp;s=40" width="20" /> </a>


    </div>

    <div id="blob_contributors_box" style="display:none">
      <h2 class="facebox-header" data-facebox-id="facebox-header">Users who have contributed to this file</h2>
      <ul class="facebox-user-list" data-facebox-id="facebox-description">
          <li class="facebox-user-list-item">
            <img alt="@hsablonniere" height="24" src="https://avatars2.githubusercontent.com/u/236342?v=3&amp;s=48" width="24" />
            <a href="/hsablonniere">hsablonniere</a>
          </li>
          <li class="facebox-user-list-item">
            <img alt="@mstalfoort" height="24" src="https://avatars1.githubusercontent.com/u/496796?v=3&amp;s=48" width="24" />
            <a href="/mstalfoort">mstalfoort</a>
          </li>
          <li class="facebox-user-list-item">
            <img alt="@skattyadz" height="24" src="https://avatars2.githubusercontent.com/u/91115?v=3&amp;s=48" width="24" />
            <a href="/skattyadz">skattyadz</a>
          </li>
      </ul>
    </div>
  </div>

<div class="file">
  <div class="file-header">
  <div class="file-actions">

    <div class="btn-group">
      <a href="/paulrouget/dzslides/raw/master/shells/embedder.html" class="btn btn-sm " id="raw-url">Raw</a>
        <a href="/paulrouget/dzslides/blame/master/shells/embedder.html" class="btn btn-sm js-update-url-with-hash">Blame</a>
      <a href="/paulrouget/dzslides/commits/master/shells/embedder.html" class="btn btn-sm " rel="nofollow">History</a>
    </div>

        <a class="octicon-btn tooltipped tooltipped-nw"
           href="github-windows://openRepo/https://github.com/paulrouget/dzslides?branch=master&amp;filepath=shells%2Fembedder.html"
           aria-label="Open this file in GitHub Desktop"
           data-ga-click="Repository, open with desktop, type:windows">
            <span class="octicon octicon-device-desktop "></span>
        </a>

        <!-- </textarea> --><!-- '"` --><form accept-charset="UTF-8" action="/paulrouget/dzslides/edit/master/shells/embedder.html" class="inline-form js-update-url-with-hash" data-form-nonce="9106897a9800a0dac68600731a49dd04473e8b1d" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="sv2jwNO0bp1mLuIl6iVFFL9mBMEtUHab2JRfjp5w3i6c/LN6DH83cxdB3iBMG5jtUWyWblChedD3Xc8/4OxnoQ==" /></div>
          <button class="octicon-btn tooltipped tooltipped-nw" type="submit"
            aria-label="Fork this project and edit the file" data-hotkey="e" data-disable-with>
            <span class="octicon octicon-pencil "></span>
          </button>
</form>        <!-- </textarea> --><!-- '"` --><form accept-charset="UTF-8" action="/paulrouget/dzslides/delete/master/shells/embedder.html" class="inline-form" data-form-nonce="9106897a9800a0dac68600731a49dd04473e8b1d" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="s07FaOBbHRpu2Xt6s/RZZo0hvVqGCFRz4KALYvIM1e2Z5oWJO3HavUI71KGsFVWFIjDPHugcA3HQ4n4Q0RvrVA==" /></div>
          <button class="octicon-btn octicon-btn-danger tooltipped tooltipped-nw" type="submit"
            aria-label="Fork this project and delete the file" data-disable-with>
            <span class="octicon octicon-trashcan "></span>
          </button>
</form>  </div>

  <div class="file-info">
      278 lines (248 sloc)
      <span class="file-info-divider"></span>
    6.83 KB
  </div>
</div>

  

  <div class="blob-wrapper data type-html">
      <table class="highlight tab-size js-file-line-container" data-tab-size="8">
      <tr>
        <td id="L1" class="blob-num js-line-number" data-line-number="1"></td>
        <td id="LC1" class="blob-code blob-code-inner js-file-line">&lt;!DOCTYPE html&gt;</td>
      </tr>
      <tr>
        <td id="L2" class="blob-num js-line-number" data-line-number="2"></td>
        <td id="LC2" class="blob-code blob-code-inner js-file-line">
</td>
      </tr>
      <tr>
        <td id="L3" class="blob-num js-line-number" data-line-number="3"></td>
        <td id="LC3" class="blob-code blob-code-inner js-file-line">&lt;<span class="pl-ent">meta</span> <span class="pl-e">charset</span>=<span class="pl-s"><span class="pl-pds">&quot;</span>utf8<span class="pl-pds">&quot;</span></span>&gt;</td>
      </tr>
      <tr>
        <td id="L4" class="blob-num js-line-number" data-line-number="4"></td>
        <td id="LC4" class="blob-code blob-code-inner js-file-line">&lt;<span class="pl-ent">title</span>&gt;...&lt;/<span class="pl-ent">title</span>&gt;</td>
      </tr>
      <tr>
        <td id="L5" class="blob-num js-line-number" data-line-number="5"></td>
        <td id="LC5" class="blob-code blob-code-inner js-file-line">
</td>
      </tr>
      <tr>
        <td id="L6" class="blob-num js-line-number" data-line-number="6"></td>
        <td id="LC6" class="blob-code blob-code-inner js-file-line">&lt;<span class="pl-ent">div</span> <span class="pl-e">id</span>=<span class="pl-s"><span class="pl-pds">&quot;</span>slides<span class="pl-pds">&quot;</span></span>&gt;</td>
      </tr>
      <tr>
        <td id="L7" class="blob-num js-line-number" data-line-number="7"></td>
        <td id="LC7" class="blob-code blob-code-inner js-file-line">  &lt;<span class="pl-ent">iframe</span> <span class="pl-e">allowfullscreen</span> <span class="pl-e">mozallowfullscreen</span> <span class="pl-e">webkitallowfullscreen</span>&gt;&lt;/<span class="pl-ent">iframe</span>&gt;</td>
      </tr>
      <tr>
        <td id="L8" class="blob-num js-line-number" data-line-number="8"></td>
        <td id="LC8" class="blob-code blob-code-inner js-file-line">&lt;/<span class="pl-ent">div</span>&gt;</td>
      </tr>
      <tr>
        <td id="L9" class="blob-num js-line-number" data-line-number="9"></td>
        <td id="LC9" class="blob-code blob-code-inner js-file-line">&lt;<span class="pl-ent">div</span> <span class="pl-e">id</span>=<span class="pl-s"><span class="pl-pds">&quot;</span>controls<span class="pl-pds">&quot;</span></span>&gt;</td>
      </tr>
      <tr>
        <td id="L10" class="blob-num js-line-number" data-line-number="10"></td>
        <td id="LC10" class="blob-code blob-code-inner js-file-line">  &lt;<span class="pl-ent">button</span> <span class="pl-e">title</span>=<span class="pl-s"><span class="pl-pds">&quot;</span>prev<span class="pl-pds">&quot;</span></span> <span class="pl-e">id</span>=<span class="pl-s"><span class="pl-pds">&quot;</span>back<span class="pl-pds">&quot;</span></span> <span class="pl-e">onclick</span>=<span class="pl-s"><span class="pl-pds">&quot;</span>Dz.back()<span class="pl-pds">&quot;</span></span>&gt;<span class="pl-c1">&amp;#9664;</span>&lt;/<span class="pl-ent">button</span>&gt;</td>
      </tr>
      <tr>
        <td id="L11" class="blob-num js-line-number" data-line-number="11"></td>
        <td id="LC11" class="blob-code blob-code-inner js-file-line">  &lt;<span class="pl-ent">button</span> <span class="pl-e">title</span>=<span class="pl-s"><span class="pl-pds">&quot;</span>next<span class="pl-pds">&quot;</span></span> <span class="pl-e">id</span>=<span class="pl-s"><span class="pl-pds">&quot;</span>forward<span class="pl-pds">&quot;</span></span> <span class="pl-e">onclick</span>=<span class="pl-s"><span class="pl-pds">&quot;</span>Dz.forward()<span class="pl-pds">&quot;</span></span>&gt;<span class="pl-c1">&amp;#9654;</span>&lt;/<span class="pl-ent">button</span>&gt;</td>
      </tr>
      <tr>
        <td id="L12" class="blob-num js-line-number" data-line-number="12"></td>
        <td id="LC12" class="blob-code blob-code-inner js-file-line">  &lt;<span class="pl-ent">div</span> <span class="pl-e">id</span>=<span class="pl-s"><span class="pl-pds">&quot;</span>rightcontrols<span class="pl-pds">&quot;</span></span>&gt;</td>
      </tr>
      <tr>
        <td id="L13" class="blob-num js-line-number" data-line-number="13"></td>
        <td id="LC13" class="blob-code blob-code-inner js-file-line">    &lt;<span class="pl-ent">input</span> <span class="pl-e">onchange</span>=<span class="pl-s"><span class="pl-pds">&quot;</span>Dz.setCursor(this.value)<span class="pl-pds">&quot;</span></span> <span class="pl-e">size</span>=<span class="pl-s"><span class="pl-pds">&quot;</span>2<span class="pl-pds">&quot;</span></span> <span class="pl-e">id</span>=<span class="pl-s"><span class="pl-pds">&quot;</span>slideidx<span class="pl-pds">&quot;</span></span> <span class="pl-e">value</span>=<span class="pl-s"><span class="pl-pds">&quot;</span>0<span class="pl-pds">&quot;</span></span> /&gt;/&lt;<span class="pl-ent">span</span> <span class="pl-e">id</span>=<span class="pl-s"><span class="pl-pds">&quot;</span>slidecount<span class="pl-pds">&quot;</span></span>&gt;...&lt;/<span class="pl-ent">span</span>&gt;</td>
      </tr>
      <tr>
        <td id="L14" class="blob-num js-line-number" data-line-number="14"></td>
        <td id="LC14" class="blob-code blob-code-inner js-file-line">    &lt;<span class="pl-ent">button</span> <span class="pl-e">title</span>=<span class="pl-s"><span class="pl-pds">&quot;</span>Go fullscreen or open in a new window<span class="pl-pds">&quot;</span></span> <span class="pl-e">id</span>=<span class="pl-s"><span class="pl-pds">&quot;</span>fullscreen<span class="pl-pds">&quot;</span></span> <span class="pl-e">onclick</span>=<span class="pl-s"><span class="pl-pds">&quot;</span>Dz.goFullscreen()<span class="pl-pds">&quot;</span></span>&gt;<span class="pl-c1">&amp;#8689;</span>&lt;/<span class="pl-ent">button</span>&gt;</td>
      </tr>
      <tr>
        <td id="L15" class="blob-num js-line-number" data-line-number="15"></td>
        <td id="LC15" class="blob-code blob-code-inner js-file-line">  &lt;/<span class="pl-ent">div</span>&gt;</td>
      </tr>
      <tr>
        <td id="L16" class="blob-num js-line-number" data-line-number="16"></td>
        <td id="LC16" class="blob-code blob-code-inner js-file-line">&lt;/<span class="pl-ent">div</span>&gt;</td>
      </tr>
      <tr>
        <td id="L17" class="blob-num js-line-number" data-line-number="17"></td>
        <td id="LC17" class="blob-code blob-code-inner js-file-line">
</td>
      </tr>
      <tr>
        <td id="L18" class="blob-num js-line-number" data-line-number="18"></td>
        <td id="LC18" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">&lt;<span class="pl-ent">style</span>&gt;</span></td>
      </tr>
      <tr>
        <td id="L19" class="blob-num js-line-number" data-line-number="19"></td>
        <td id="LC19" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-ent">html</span> { <span class="pl-c1"><span class="pl-c1">height</span></span>: <span class="pl-c1">100<span class="pl-k">%</span></span>;}</span></td>
      </tr>
      <tr>
        <td id="L20" class="blob-num js-line-number" data-line-number="20"></td>
        <td id="LC20" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-ent">body</span> {</span></td>
      </tr>
      <tr>
        <td id="L21" class="blob-num js-line-number" data-line-number="21"></td>
        <td id="LC21" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">margin</span></span>: <span class="pl-c1">0</span>;</span></td>
      </tr>
      <tr>
        <td id="L22" class="blob-num js-line-number" data-line-number="22"></td>
        <td id="LC22" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">background-color</span></span>: <span class="pl-c1">black</span>;</span></td>
      </tr>
      <tr>
        <td id="L23" class="blob-num js-line-number" data-line-number="23"></td>
        <td id="LC23" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">height</span></span>: <span class="pl-c1">100<span class="pl-k">%</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L24" class="blob-num js-line-number" data-line-number="24"></td>
        <td id="LC24" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">width</span></span>: <span class="pl-c1">100<span class="pl-k">%</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L25" class="blob-num js-line-number" data-line-number="25"></td>
        <td id="LC25" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L26" class="blob-num js-line-number" data-line-number="26"></td>
        <td id="LC26" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-e">#slides</span>, <span class="pl-e">#controls</span> {</span></td>
      </tr>
      <tr>
        <td id="L27" class="blob-num js-line-number" data-line-number="27"></td>
        <td id="LC27" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">left</span></span>: <span class="pl-c1">0</span>;</span></td>
      </tr>
      <tr>
        <td id="L28" class="blob-num js-line-number" data-line-number="28"></td>
        <td id="LC28" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">position</span></span>: <span class="pl-c1">absolute</span>;</span></td>
      </tr>
      <tr>
        <td id="L29" class="blob-num js-line-number" data-line-number="29"></td>
        <td id="LC29" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">right</span></span>: <span class="pl-c1">0</span>;</span></td>
      </tr>
      <tr>
        <td id="L30" class="blob-num js-line-number" data-line-number="30"></td>
        <td id="LC30" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L31" class="blob-num js-line-number" data-line-number="31"></td>
        <td id="LC31" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-e">#controls</span> {</span></td>
      </tr>
      <tr>
        <td id="L32" class="blob-num js-line-number" data-line-number="32"></td>
        <td id="LC32" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">color</span></span>: <span class="pl-c1">white</span>;</span></td>
      </tr>
      <tr>
        <td id="L33" class="blob-num js-line-number" data-line-number="33"></td>
        <td id="LC33" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">font-family</span></span>: <span class="pl-c1">monospace</span>;</span></td>
      </tr>
      <tr>
        <td id="L34" class="blob-num js-line-number" data-line-number="34"></td>
        <td id="LC34" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">height</span></span>: <span class="pl-c1">30<span class="pl-k">px</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L35" class="blob-num js-line-number" data-line-number="35"></td>
        <td id="LC35" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">line-height</span></span>: <span class="pl-c1">30<span class="pl-k">px</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L36" class="blob-num js-line-number" data-line-number="36"></td>
        <td id="LC36" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">padding</span></span>: <span class="pl-c1">5<span class="pl-k">px</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L37" class="blob-num js-line-number" data-line-number="37"></td>
        <td id="LC37" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L38" class="blob-num js-line-number" data-line-number="38"></td>
        <td id="LC38" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-e">#slides</span> {</span></td>
      </tr>
      <tr>
        <td id="L39" class="blob-num js-line-number" data-line-number="39"></td>
        <td id="LC39" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">bottom</span></span>: <span class="pl-c1">40<span class="pl-k">px</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L40" class="blob-num js-line-number" data-line-number="40"></td>
        <td id="LC40" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">top</span></span>: <span class="pl-c1">0</span>;</span></td>
      </tr>
      <tr>
        <td id="L41" class="blob-num js-line-number" data-line-number="41"></td>
        <td id="LC41" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L42" class="blob-num js-line-number" data-line-number="42"></td>
        <td id="LC42" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-ent">iframe</span> {</span></td>
      </tr>
      <tr>
        <td id="L43" class="blob-num js-line-number" data-line-number="43"></td>
        <td id="LC43" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">border</span></span>: <span class="pl-c1">none</span>;</span></td>
      </tr>
      <tr>
        <td id="L44" class="blob-num js-line-number" data-line-number="44"></td>
        <td id="LC44" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">background-color</span></span>: <span class="pl-c1">white</span>;</span></td>
      </tr>
      <tr>
        <td id="L45" class="blob-num js-line-number" data-line-number="45"></td>
        <td id="LC45" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">height</span></span>: <span class="pl-c1">100<span class="pl-k">%</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L46" class="blob-num js-line-number" data-line-number="46"></td>
        <td id="LC46" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">width</span></span>: <span class="pl-c1">100<span class="pl-k">%</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L47" class="blob-num js-line-number" data-line-number="47"></td>
        <td id="LC47" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L48" class="blob-num js-line-number" data-line-number="48"></td>
        <td id="LC48" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-e">#controls</span> {</span></td>
      </tr>
      <tr>
        <td id="L49" class="blob-num js-line-number" data-line-number="49"></td>
        <td id="LC49" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">bottom</span></span>: <span class="pl-c1">0</span>;</span></td>
      </tr>
      <tr>
        <td id="L50" class="blob-num js-line-number" data-line-number="50"></td>
        <td id="LC50" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">float</span></span>: <span class="pl-c1">right</span>;</span></td>
      </tr>
      <tr>
        <td id="L51" class="blob-num js-line-number" data-line-number="51"></td>
        <td id="LC51" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">font-size</span></span>: <span class="pl-c1">13<span class="pl-k">px</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L52" class="blob-num js-line-number" data-line-number="52"></td>
        <td id="LC52" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">text-align</span></span>: <span class="pl-c1">center</span>;</span></td>
      </tr>
      <tr>
        <td id="L53" class="blob-num js-line-number" data-line-number="53"></td>
        <td id="LC53" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L54" class="blob-num js-line-number" data-line-number="54"></td>
        <td id="LC54" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-e">#controls</span> <span class="pl-ent">button</span>[disabled] {<span class="pl-c1"><span class="pl-c1">color</span></span>: <span class="pl-c1">#333</span>;}</span></td>
      </tr>
      <tr>
        <td id="L55" class="blob-num js-line-number" data-line-number="55"></td>
        <td id="LC55" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-ent">button</span> {</span></td>
      </tr>
      <tr>
        <td id="L56" class="blob-num js-line-number" data-line-number="56"></td>
        <td id="LC56" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">background-color</span></span>: <span class="pl-c1">transparent</span>;</span></td>
      </tr>
      <tr>
        <td id="L57" class="blob-num js-line-number" data-line-number="57"></td>
        <td id="LC57" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">border</span></span>: <span class="pl-c1">none</span>;</span></td>
      </tr>
      <tr>
        <td id="L58" class="blob-num js-line-number" data-line-number="58"></td>
        <td id="LC58" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">cursor</span></span>: <span class="pl-c1">pointer</span>;</span></td>
      </tr>
      <tr>
        <td id="L59" class="blob-num js-line-number" data-line-number="59"></td>
        <td id="LC59" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">color</span></span>: <span class="pl-c1">#bbb</span>;</span></td>
      </tr>
      <tr>
        <td id="L60" class="blob-num js-line-number" data-line-number="60"></td>
        <td id="LC60" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">padding</span></span>: <span class="pl-c1">0</span>;</span></td>
      </tr>
      <tr>
        <td id="L61" class="blob-num js-line-number" data-line-number="61"></td>
        <td id="LC61" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">font-size</span></span>: <span class="pl-c1">20<span class="pl-k">px</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L62" class="blob-num js-line-number" data-line-number="62"></td>
        <td id="LC62" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">line-height</span></span>: <span class="pl-c1">100<span class="pl-k">%</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L63" class="blob-num js-line-number" data-line-number="63"></td>
        <td id="LC63" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1">-webkit-<span class="pl-c1">user-select</span></span>: <span class="pl-c1">none</span>;</span></td>
      </tr>
      <tr>
        <td id="L64" class="blob-num js-line-number" data-line-number="64"></td>
        <td id="LC64" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1">-khtml-<span class="pl-c1">user-select</span></span>: <span class="pl-c1">none</span>;</span></td>
      </tr>
      <tr>
        <td id="L65" class="blob-num js-line-number" data-line-number="65"></td>
        <td id="LC65" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1">-moz-<span class="pl-c1">user-select</span></span>: <span class="pl-c1">none</span>;</span></td>
      </tr>
      <tr>
        <td id="L66" class="blob-num js-line-number" data-line-number="66"></td>
        <td id="LC66" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1">-o-<span class="pl-c1">user-select</span></span>: <span class="pl-c1">none</span>;</span></td>
      </tr>
      <tr>
        <td id="L67" class="blob-num js-line-number" data-line-number="67"></td>
        <td id="LC67" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">user-select</span></span>: <span class="pl-c1">none</span>;</span></td>
      </tr>
      <tr>
        <td id="L68" class="blob-num js-line-number" data-line-number="68"></td>
        <td id="LC68" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">position</span></span>: <span class="pl-c1">relative</span>;</span></td>
      </tr>
      <tr>
        <td id="L69" class="blob-num js-line-number" data-line-number="69"></td>
        <td id="LC69" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L70" class="blob-num js-line-number" data-line-number="70"></td>
        <td id="LC70" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-ent">button</span><span class="pl-e">:hover</span> {</span></td>
      </tr>
      <tr>
        <td id="L71" class="blob-num js-line-number" data-line-number="71"></td>
        <td id="LC71" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">color</span></span>: <span class="pl-c1">white</span>;</span></td>
      </tr>
      <tr>
        <td id="L72" class="blob-num js-line-number" data-line-number="72"></td>
        <td id="LC72" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L73" class="blob-num js-line-number" data-line-number="73"></td>
        <td id="LC73" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-ent">button</span><span class="pl-e">:active</span> {</span></td>
      </tr>
      <tr>
        <td id="L74" class="blob-num js-line-number" data-line-number="74"></td>
        <td id="LC74" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">top</span></span>: <span class="pl-c1">1<span class="pl-k">px</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L75" class="blob-num js-line-number" data-line-number="75"></td>
        <td id="LC75" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">left</span></span>: <span class="pl-c1">1<span class="pl-k">px</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L76" class="blob-num js-line-number" data-line-number="76"></td>
        <td id="LC76" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L77" class="blob-num js-line-number" data-line-number="77"></td>
        <td id="LC77" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-e">#slideidx</span> {</span></td>
      </tr>
      <tr>
        <td id="L78" class="blob-num js-line-number" data-line-number="78"></td>
        <td id="LC78" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">border</span></span>: <span class="pl-c1">none</span>;</span></td>
      </tr>
      <tr>
        <td id="L79" class="blob-num js-line-number" data-line-number="79"></td>
        <td id="LC79" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">background-color</span></span>: <span class="pl-c1">rgba</span>(<span class="pl-c1">255, 255, 255, 0.2</span>);</span></td>
      </tr>
      <tr>
        <td id="L80" class="blob-num js-line-number" data-line-number="80"></td>
        <td id="LC80" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">color</span></span>: <span class="pl-c1">white</span>;</span></td>
      </tr>
      <tr>
        <td id="L81" class="blob-num js-line-number" data-line-number="81"></td>
        <td id="LC81" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">text-align</span></span>: <span class="pl-c1">center</span>;</span></td>
      </tr>
      <tr>
        <td id="L82" class="blob-num js-line-number" data-line-number="82"></td>
        <td id="LC82" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L83" class="blob-num js-line-number" data-line-number="83"></td>
        <td id="LC83" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-e">#rightcontrols</span> <span class="pl-ent">*</span> { <span class="pl-c1"><span class="pl-c1">vertical-align</span></span>: <span class="pl-c1">middle</span>; }</span></td>
      </tr>
      <tr>
        <td id="L84" class="blob-num js-line-number" data-line-number="84"></td>
        <td id="LC84" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-e">#rightcontrols</span> {</span></td>
      </tr>
      <tr>
        <td id="L85" class="blob-num js-line-number" data-line-number="85"></td>
        <td id="LC85" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">bottom</span></span>: <span class="pl-c1">4<span class="pl-k">px</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L86" class="blob-num js-line-number" data-line-number="86"></td>
        <td id="LC86" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">position</span></span>: <span class="pl-c1">absolute</span>;</span></td>
      </tr>
      <tr>
        <td id="L87" class="blob-num js-line-number" data-line-number="87"></td>
        <td id="LC87" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">top</span></span>: <span class="pl-c1">4<span class="pl-k">px</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L88" class="blob-num js-line-number" data-line-number="88"></td>
        <td id="LC88" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1"><span class="pl-c1">right</span></span>: <span class="pl-c1">10<span class="pl-k">px</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L89" class="blob-num js-line-number" data-line-number="89"></td>
        <td id="LC89" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L90" class="blob-num js-line-number" data-line-number="90"></td>
        <td id="LC90" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-e">#fullscreen</span> {<span class="pl-c1">-moz-<span class="pl-c1">transform</span></span>: scaleX(<span class="pl-c1">-1</span>);<span class="pl-c1">-webkit-<span class="pl-c1">transform</span></span>: scaleX(<span class="pl-c1">-1</span>);<span class="pl-c1">-o-<span class="pl-c1">transform</span></span>: scaleX(<span class="pl-c1">-1</span>);<span class="pl-c1">-ms-<span class="pl-c1">transform</span></span>: scaleX(<span class="pl-c1">-1</span>);<span class="pl-c1"><span class="pl-c1">transform</span></span>: scaleX(<span class="pl-c1">-1</span>);}</span></td>
      </tr>
      <tr>
        <td id="L91" class="blob-num js-line-number" data-line-number="91"></td>
        <td id="LC91" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">&lt;/<span class="pl-ent">style</span>&gt;</span></td>
      </tr>
      <tr>
        <td id="L92" class="blob-num js-line-number" data-line-number="92"></td>
        <td id="LC92" class="blob-code blob-code-inner js-file-line">
</td>
      </tr>
      <tr>
        <td id="L93" class="blob-num js-line-number" data-line-number="93"></td>
        <td id="LC93" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">&lt;<span class="pl-ent">script</span>&gt;</span></td>
      </tr>
      <tr>
        <td id="L94" class="blob-num js-line-number" data-line-number="94"></td>
        <td id="LC94" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-k">var</span> Dz <span class="pl-k">=</span> {</span></td>
      </tr>
      <tr>
        <td id="L95" class="blob-num js-line-number" data-line-number="95"></td>
        <td id="LC95" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    view<span class="pl-k">:</span> <span class="pl-c1">null</span>,</span></td>
      </tr>
      <tr>
        <td id="L96" class="blob-num js-line-number" data-line-number="96"></td>
        <td id="LC96" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    url<span class="pl-k">:</span> <span class="pl-c1">null</span>,</span></td>
      </tr>
      <tr>
        <td id="L97" class="blob-num js-line-number" data-line-number="97"></td>
        <td id="LC97" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    idx<span class="pl-k">:</span> <span class="pl-c1">1</span>,</span></td>
      </tr>
      <tr>
        <td id="L98" class="blob-num js-line-number" data-line-number="98"></td>
        <td id="LC98" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    count<span class="pl-k">:</span> <span class="pl-c1">null</span>,</span></td>
      </tr>
      <tr>
        <td id="L99" class="blob-num js-line-number" data-line-number="99"></td>
        <td id="LC99" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    iframe<span class="pl-k">:</span> <span class="pl-c1">null</span></span></td>
      </tr>
      <tr>
        <td id="L100" class="blob-num js-line-number" data-line-number="100"></td>
        <td id="LC100" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  };</span></td>
      </tr>
      <tr>
        <td id="L101" class="blob-num js-line-number" data-line-number="101"></td>
        <td id="LC101" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  </span></td>
      </tr>
      <tr>
        <td id="L102" class="blob-num js-line-number" data-line-number="102"></td>
        <td id="LC102" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-c1">Dz</span>.<span class="pl-en">init</span> <span class="pl-k">=</span> <span class="pl-k">function</span>() {</span></td>
      </tr>
      <tr>
        <td id="L103" class="blob-num js-line-number" data-line-number="103"></td>
        <td id="LC103" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-v">this</span>.<span class="pl-en">loadIframe</span>();</span></td>
      </tr>
      <tr>
        <td id="L104" class="blob-num js-line-number" data-line-number="104"></td>
        <td id="LC104" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L105" class="blob-num js-line-number" data-line-number="105"></td>
        <td id="LC105" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  </span></td>
      </tr>
      <tr>
        <td id="L106" class="blob-num js-line-number" data-line-number="106"></td>
        <td id="LC106" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-c1">Dz</span>.<span class="pl-en">onkeydown</span> <span class="pl-k">=</span> <span class="pl-k">function</span>(<span class="pl-smi">aEvent</span>) {</span></td>
      </tr>
      <tr>
        <td id="L107" class="blob-num js-line-number" data-line-number="107"></td>
        <td id="LC107" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c">// Don&#39;t intercept keyboard shortcuts</span></span></td>
      </tr>
      <tr>
        <td id="L108" class="blob-num js-line-number" data-line-number="108"></td>
        <td id="LC108" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-k">if</span> (<span class="pl-smi">aEvent</span>.<span class="pl-smi">altKey</span></span></td>
      </tr>
      <tr>
        <td id="L109" class="blob-num js-line-number" data-line-number="109"></td>
        <td id="LC109" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-k">||</span> <span class="pl-smi">aEvent</span>.<span class="pl-smi">ctrlKey</span></span></td>
      </tr>
      <tr>
        <td id="L110" class="blob-num js-line-number" data-line-number="110"></td>
        <td id="LC110" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-k">||</span> <span class="pl-smi">aEvent</span>.<span class="pl-smi">metaKey</span></span></td>
      </tr>
      <tr>
        <td id="L111" class="blob-num js-line-number" data-line-number="111"></td>
        <td id="LC111" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-k">||</span> <span class="pl-smi">aEvent</span>.<span class="pl-smi">shiftKey</span>) {</span></td>
      </tr>
      <tr>
        <td id="L112" class="blob-num js-line-number" data-line-number="112"></td>
        <td id="LC112" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-k">return</span>;</span></td>
      </tr>
      <tr>
        <td id="L113" class="blob-num js-line-number" data-line-number="113"></td>
        <td id="LC113" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    }</span></td>
      </tr>
      <tr>
        <td id="L114" class="blob-num js-line-number" data-line-number="114"></td>
        <td id="LC114" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-k">if</span> ( <span class="pl-smi">aEvent</span>.<span class="pl-smi">keyCode</span> <span class="pl-k">==</span> <span class="pl-c1">37</span> <span class="pl-c">// left arrow</span></span></td>
      </tr>
      <tr>
        <td id="L115" class="blob-num js-line-number" data-line-number="115"></td>
        <td id="LC115" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-k">||</span> <span class="pl-smi">aEvent</span>.<span class="pl-smi">keyCode</span> <span class="pl-k">==</span> <span class="pl-c1">38</span> <span class="pl-c">// up arrow</span></span></td>
      </tr>
      <tr>
        <td id="L116" class="blob-num js-line-number" data-line-number="116"></td>
        <td id="LC116" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-k">||</span> <span class="pl-smi">aEvent</span>.<span class="pl-smi">keyCode</span> <span class="pl-k">==</span> <span class="pl-c1">33</span> <span class="pl-c">// page up</span></span></td>
      </tr>
      <tr>
        <td id="L117" class="blob-num js-line-number" data-line-number="117"></td>
        <td id="LC117" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    ) {</span></td>
      </tr>
      <tr>
        <td id="L118" class="blob-num js-line-number" data-line-number="118"></td>
        <td id="LC118" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-smi">aEvent</span>.<span class="pl-en">preventDefault</span>();</span></td>
      </tr>
      <tr>
        <td id="L119" class="blob-num js-line-number" data-line-number="119"></td>
        <td id="LC119" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-v">this</span>.<span class="pl-c1">back</span>();</span></td>
      </tr>
      <tr>
        <td id="L120" class="blob-num js-line-number" data-line-number="120"></td>
        <td id="LC120" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    }</span></td>
      </tr>
      <tr>
        <td id="L121" class="blob-num js-line-number" data-line-number="121"></td>
        <td id="LC121" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-k">if</span> ( <span class="pl-smi">aEvent</span>.<span class="pl-smi">keyCode</span> <span class="pl-k">==</span> <span class="pl-c1">39</span> <span class="pl-c">// right arrow</span></span></td>
      </tr>
      <tr>
        <td id="L122" class="blob-num js-line-number" data-line-number="122"></td>
        <td id="LC122" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-k">||</span> <span class="pl-smi">aEvent</span>.<span class="pl-smi">keyCode</span> <span class="pl-k">==</span> <span class="pl-c1">40</span> <span class="pl-c">// down arrow</span></span></td>
      </tr>
      <tr>
        <td id="L123" class="blob-num js-line-number" data-line-number="123"></td>
        <td id="LC123" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-k">||</span> <span class="pl-smi">aEvent</span>.<span class="pl-smi">keyCode</span> <span class="pl-k">==</span> <span class="pl-c1">34</span> <span class="pl-c">// page down</span></span></td>
      </tr>
      <tr>
        <td id="L124" class="blob-num js-line-number" data-line-number="124"></td>
        <td id="LC124" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    ) {</span></td>
      </tr>
      <tr>
        <td id="L125" class="blob-num js-line-number" data-line-number="125"></td>
        <td id="LC125" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-smi">aEvent</span>.<span class="pl-en">preventDefault</span>();</span></td>
      </tr>
      <tr>
        <td id="L126" class="blob-num js-line-number" data-line-number="126"></td>
        <td id="LC126" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-v">this</span>.<span class="pl-c1">forward</span>();</span></td>
      </tr>
      <tr>
        <td id="L127" class="blob-num js-line-number" data-line-number="127"></td>
        <td id="LC127" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    }</span></td>
      </tr>
      <tr>
        <td id="L128" class="blob-num js-line-number" data-line-number="128"></td>
        <td id="LC128" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-k">if</span> (<span class="pl-smi">aEvent</span>.<span class="pl-smi">keyCode</span> <span class="pl-k">==</span> <span class="pl-c1">35</span>) { <span class="pl-c">// end</span></span></td>
      </tr>
      <tr>
        <td id="L129" class="blob-num js-line-number" data-line-number="129"></td>
        <td id="LC129" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-smi">aEvent</span>.<span class="pl-en">preventDefault</span>();</span></td>
      </tr>
      <tr>
        <td id="L130" class="blob-num js-line-number" data-line-number="130"></td>
        <td id="LC130" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-v">this</span>.<span class="pl-en">goEnd</span>();</span></td>
      </tr>
      <tr>
        <td id="L131" class="blob-num js-line-number" data-line-number="131"></td>
        <td id="LC131" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    }</span></td>
      </tr>
      <tr>
        <td id="L132" class="blob-num js-line-number" data-line-number="132"></td>
        <td id="LC132" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-k">if</span> (<span class="pl-smi">aEvent</span>.<span class="pl-smi">keyCode</span> <span class="pl-k">==</span> <span class="pl-c1">36</span>) { <span class="pl-c">// home</span></span></td>
      </tr>
      <tr>
        <td id="L133" class="blob-num js-line-number" data-line-number="133"></td>
        <td id="LC133" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-smi">aEvent</span>.<span class="pl-en">preventDefault</span>();</span></td>
      </tr>
      <tr>
        <td id="L134" class="blob-num js-line-number" data-line-number="134"></td>
        <td id="LC134" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-v">this</span>.<span class="pl-en">goStart</span>();</span></td>
      </tr>
      <tr>
        <td id="L135" class="blob-num js-line-number" data-line-number="135"></td>
        <td id="LC135" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    }</span></td>
      </tr>
      <tr>
        <td id="L136" class="blob-num js-line-number" data-line-number="136"></td>
        <td id="LC136" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-k">if</span> (<span class="pl-smi">aEvent</span>.<span class="pl-smi">keyCode</span> <span class="pl-k">==</span> <span class="pl-c1">32</span>) { <span class="pl-c">// space</span></span></td>
      </tr>
      <tr>
        <td id="L137" class="blob-num js-line-number" data-line-number="137"></td>
        <td id="LC137" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-smi">aEvent</span>.<span class="pl-en">preventDefault</span>();</span></td>
      </tr>
      <tr>
        <td id="L138" class="blob-num js-line-number" data-line-number="138"></td>
        <td id="LC138" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-v">this</span>.<span class="pl-en">toggleContent</span>();</span></td>
      </tr>
      <tr>
        <td id="L139" class="blob-num js-line-number" data-line-number="139"></td>
        <td id="LC139" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    }</span></td>
      </tr>
      <tr>
        <td id="L140" class="blob-num js-line-number" data-line-number="140"></td>
        <td id="LC140" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-k">if</span> (<span class="pl-smi">aEvent</span>.<span class="pl-smi">keyCode</span> <span class="pl-k">==</span> <span class="pl-c1">70</span>) { <span class="pl-c">// f</span></span></td>
      </tr>
      <tr>
        <td id="L141" class="blob-num js-line-number" data-line-number="141"></td>
        <td id="LC141" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-smi">aEvent</span>.<span class="pl-en">preventDefault</span>();</span></td>
      </tr>
      <tr>
        <td id="L142" class="blob-num js-line-number" data-line-number="142"></td>
        <td id="LC142" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-v">this</span>.<span class="pl-en">goFullscreen</span>();</span></td>
      </tr>
      <tr>
        <td id="L143" class="blob-num js-line-number" data-line-number="143"></td>
        <td id="LC143" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    }</span></td>
      </tr>
      <tr>
        <td id="L144" class="blob-num js-line-number" data-line-number="144"></td>
        <td id="LC144" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L145" class="blob-num js-line-number" data-line-number="145"></td>
        <td id="LC145" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  </span></td>
      </tr>
      <tr>
        <td id="L146" class="blob-num js-line-number" data-line-number="146"></td>
        <td id="LC146" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-c1">Dz</span>.<span class="pl-en">onmessage</span> <span class="pl-k">=</span> <span class="pl-k">function</span>(<span class="pl-smi">aEvent</span>) {</span></td>
      </tr>
      <tr>
        <td id="L147" class="blob-num js-line-number" data-line-number="147"></td>
        <td id="LC147" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-k">if</span> (<span class="pl-smi">aEvent</span>.<span class="pl-c1">source</span> <span class="pl-k">===</span> <span class="pl-v">this</span>.<span class="pl-smi">view</span>) {</span></td>
      </tr>
      <tr>
        <td id="L148" class="blob-num js-line-number" data-line-number="148"></td>
        <td id="LC148" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-k">var</span> argv <span class="pl-k">=</span> <span class="pl-smi">aEvent</span>.<span class="pl-c1">data</span>.<span class="pl-c1">split</span>(<span class="pl-s"><span class="pl-pds">&quot;</span> <span class="pl-pds">&quot;</span></span>), argc <span class="pl-k">=</span> <span class="pl-smi">argv</span>.<span class="pl-c1">length</span>;</span></td>
      </tr>
      <tr>
        <td id="L149" class="blob-num js-line-number" data-line-number="149"></td>
        <td id="LC149" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-smi">argv</span>.<span class="pl-en">forEach</span>(<span class="pl-k">function</span>(<span class="pl-smi">e</span>, <span class="pl-smi">i</span>, <span class="pl-smi">a</span>) { a[i] <span class="pl-k">=</span> <span class="pl-en">decodeURIComponent</span>(e) });</span></td>
      </tr>
      <tr>
        <td id="L150" class="blob-num js-line-number" data-line-number="150"></td>
        <td id="LC150" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-k">if</span> (argv[<span class="pl-c1">0</span>] <span class="pl-k">===</span> <span class="pl-s"><span class="pl-pds">&quot;</span>CURSOR<span class="pl-pds">&quot;</span></span> <span class="pl-k">&amp;&amp;</span> argc <span class="pl-k">===</span> <span class="pl-c1">2</span>) {</span></td>
      </tr>
      <tr>
        <td id="L151" class="blob-num js-line-number" data-line-number="151"></td>
        <td id="LC151" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">        <span class="pl-k">var</span> cursor <span class="pl-k">=</span> argv[<span class="pl-c1">1</span>].<span class="pl-c1">split</span>(<span class="pl-s"><span class="pl-pds">&quot;</span>.<span class="pl-pds">&quot;</span></span>);</span></td>
      </tr>
      <tr>
        <td id="L152" class="blob-num js-line-number" data-line-number="152"></td>
        <td id="LC152" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">        <span class="pl-v">this</span>.<span class="pl-smi">idx</span> <span class="pl-k">=</span> <span class="pl-k">~~</span>cursor[<span class="pl-c1">0</span>];</span></td>
      </tr>
      <tr>
        <td id="L153" class="blob-num js-line-number" data-line-number="153"></td>
        <td id="LC153" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">        <span class="pl-v">this</span>.<span class="pl-smi">step</span> <span class="pl-k">=</span> <span class="pl-k">~~</span>cursor[<span class="pl-c1">1</span>];</span></td>
      </tr>
      <tr>
        <td id="L154" class="blob-num js-line-number" data-line-number="154"></td>
        <td id="LC154" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">        <span class="pl-en">$</span>(<span class="pl-s"><span class="pl-pds">&quot;</span>#slideidx<span class="pl-pds">&quot;</span></span>).<span class="pl-c1">value</span> <span class="pl-k">=</span> <span class="pl-v">this</span>.<span class="pl-smi">idx</span>;</span></td>
      </tr>
      <tr>
        <td id="L155" class="blob-num js-line-number" data-line-number="155"></td>
        <td id="LC155" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">        <span class="pl-en">$</span>(<span class="pl-s"><span class="pl-pds">&quot;</span>#back<span class="pl-pds">&quot;</span></span>).<span class="pl-c1">disabled</span> <span class="pl-k">=</span> <span class="pl-v">this</span>.<span class="pl-smi">idx</span> <span class="pl-k">==</span> <span class="pl-c1">1</span>;</span></td>
      </tr>
      <tr>
        <td id="L156" class="blob-num js-line-number" data-line-number="156"></td>
        <td id="LC156" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">        <span class="pl-en">$</span>(<span class="pl-s"><span class="pl-pds">&quot;</span>#forward<span class="pl-pds">&quot;</span></span>).<span class="pl-c1">disabled</span> <span class="pl-k">=</span> <span class="pl-v">this</span>.<span class="pl-smi">idx</span> <span class="pl-k">==</span> <span class="pl-v">this</span>.<span class="pl-smi">count</span>;</span></td>
      </tr>
      <tr>
        <td id="L157" class="blob-num js-line-number" data-line-number="157"></td>
        <td id="LC157" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      }</span></td>
      </tr>
      <tr>
        <td id="L158" class="blob-num js-line-number" data-line-number="158"></td>
        <td id="LC158" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-k">if</span> (argv[<span class="pl-c1">0</span>] <span class="pl-k">===</span> <span class="pl-s"><span class="pl-pds">&quot;</span>REGISTERED<span class="pl-pds">&quot;</span></span> <span class="pl-k">&amp;&amp;</span> argc <span class="pl-k">===</span> <span class="pl-c1">3</span>) {</span></td>
      </tr>
      <tr>
        <td id="L159" class="blob-num js-line-number" data-line-number="159"></td>
        <td id="LC159" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">        <span class="pl-en">$</span>(<span class="pl-s"><span class="pl-pds">&quot;</span>#slidecount<span class="pl-pds">&quot;</span></span>).<span class="pl-smi">innerHTML</span> <span class="pl-k">=</span> <span class="pl-v">this</span>.<span class="pl-smi">count</span> <span class="pl-k">=</span> argv[<span class="pl-c1">2</span>];</span></td>
      </tr>
      <tr>
        <td id="L160" class="blob-num js-line-number" data-line-number="160"></td>
        <td id="LC160" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">        <span class="pl-smi">document</span>.<span class="pl-c1">title</span> <span class="pl-k">=</span> argv[<span class="pl-c1">1</span>];</span></td>
      </tr>
      <tr>
        <td id="L161" class="blob-num js-line-number" data-line-number="161"></td>
        <td id="LC161" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      }</span></td>
      </tr>
      <tr>
        <td id="L162" class="blob-num js-line-number" data-line-number="162"></td>
        <td id="LC162" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    }</span></td>
      </tr>
      <tr>
        <td id="L163" class="blob-num js-line-number" data-line-number="163"></td>
        <td id="LC163" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L164" class="blob-num js-line-number" data-line-number="164"></td>
        <td id="LC164" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  </span></td>
      </tr>
      <tr>
        <td id="L165" class="blob-num js-line-number" data-line-number="165"></td>
        <td id="LC165" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-c">/* Get url from hash or prompt and store it */</span></span></td>
      </tr>
      <tr>
        <td id="L166" class="blob-num js-line-number" data-line-number="166"></td>
        <td id="LC166" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  </span></td>
      </tr>
      <tr>
        <td id="L167" class="blob-num js-line-number" data-line-number="167"></td>
        <td id="LC167" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-c1">Dz</span>.<span class="pl-en">getUrl</span> <span class="pl-k">=</span> <span class="pl-k">function</span>() {</span></td>
      </tr>
      <tr>
        <td id="L168" class="blob-num js-line-number" data-line-number="168"></td>
        <td id="LC168" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-k">var</span> u <span class="pl-k">=</span> <span class="pl-smi">window</span>.<span class="pl-c1">location</span>.<span class="pl-c1">hash</span>.<span class="pl-c1">split</span>(<span class="pl-s"><span class="pl-pds">&quot;</span>#<span class="pl-pds">&quot;</span></span>)[<span class="pl-c1">1</span>];</span></td>
      </tr>
      <tr>
        <td id="L169" class="blob-num js-line-number" data-line-number="169"></td>
        <td id="LC169" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-k">if</span> (<span class="pl-k">!</span>u) {</span></td>
      </tr>
      <tr>
        <td id="L170" class="blob-num js-line-number" data-line-number="170"></td>
        <td id="LC170" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      u <span class="pl-k">=</span> <span class="pl-smi">window</span>.<span class="pl-c1">prompt</span>(<span class="pl-s"><span class="pl-pds">&quot;</span>What is the URL of the slides?<span class="pl-pds">&quot;</span></span>);</span></td>
      </tr>
      <tr>
        <td id="L171" class="blob-num js-line-number" data-line-number="171"></td>
        <td id="LC171" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-k">if</span> (u) {</span></td>
      </tr>
      <tr>
        <td id="L172" class="blob-num js-line-number" data-line-number="172"></td>
        <td id="LC172" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">        <span class="pl-smi">window</span>.<span class="pl-c1">location</span>.<span class="pl-c1">hash</span> <span class="pl-k">=</span> <span class="pl-smi">u</span>.<span class="pl-c1">split</span>(<span class="pl-s"><span class="pl-pds">&quot;</span>#<span class="pl-pds">&quot;</span></span>)[<span class="pl-c1">0</span>];</span></td>
      </tr>
      <tr>
        <td id="L173" class="blob-num js-line-number" data-line-number="173"></td>
        <td id="LC173" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">        <span class="pl-k">return</span> u;</span></td>
      </tr>
      <tr>
        <td id="L174" class="blob-num js-line-number" data-line-number="174"></td>
        <td id="LC174" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      }</span></td>
      </tr>
      <tr>
        <td id="L175" class="blob-num js-line-number" data-line-number="175"></td>
        <td id="LC175" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      u <span class="pl-k">=</span> <span class="pl-s"><span class="pl-pds">&quot;</span>&lt;style&gt;body{background-color:white;color:black}&lt;/style&gt;<span class="pl-pds">&quot;</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L176" class="blob-num js-line-number" data-line-number="176"></td>
        <td id="LC176" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      u <span class="pl-k">+=</span> <span class="pl-s"><span class="pl-pds">&quot;</span>&lt;strong&gt;ERROR:&lt;/strong&gt; No URL specified.&lt;br&gt;<span class="pl-pds">&quot;</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L177" class="blob-num js-line-number" data-line-number="177"></td>
        <td id="LC177" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      u <span class="pl-k">+=</span> <span class="pl-s"><span class="pl-pds">&quot;</span>Try&lt;em&gt;: <span class="pl-pds">&quot;</span></span> <span class="pl-k">+</span> <span class="pl-smi">document</span>.<span class="pl-c1">location</span> <span class="pl-k">+</span> <span class="pl-s"><span class="pl-pds">&quot;</span>#yourslides.html&lt;/em&gt;<span class="pl-pds">&quot;</span></span>;</span></td>
      </tr>
      <tr>
        <td id="L178" class="blob-num js-line-number" data-line-number="178"></td>
        <td id="LC178" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      u <span class="pl-k">=</span> <span class="pl-s"><span class="pl-pds">&quot;</span>data:text/html,<span class="pl-pds">&quot;</span></span> <span class="pl-k">+</span> <span class="pl-en">encodeURIComponent</span>(u);</span></td>
      </tr>
      <tr>
        <td id="L179" class="blob-num js-line-number" data-line-number="179"></td>
        <td id="LC179" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    }</span></td>
      </tr>
      <tr>
        <td id="L180" class="blob-num js-line-number" data-line-number="180"></td>
        <td id="LC180" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-k">return</span> u;</span></td>
      </tr>
      <tr>
        <td id="L181" class="blob-num js-line-number" data-line-number="181"></td>
        <td id="LC181" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L182" class="blob-num js-line-number" data-line-number="182"></td>
        <td id="LC182" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  </span></td>
      </tr>
      <tr>
        <td id="L183" class="blob-num js-line-number" data-line-number="183"></td>
        <td id="LC183" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-c1">Dz</span>.<span class="pl-en">loadIframe</span> <span class="pl-k">=</span> <span class="pl-k">function</span>() {</span></td>
      </tr>
      <tr>
        <td id="L184" class="blob-num js-line-number" data-line-number="184"></td>
        <td id="LC184" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-v">this</span>.<span class="pl-smi">iframe</span> <span class="pl-k">=</span> <span class="pl-en">$</span>(<span class="pl-s"><span class="pl-pds">&quot;</span>iframe<span class="pl-pds">&quot;</span></span>);</span></td>
      </tr>
      <tr>
        <td id="L185" class="blob-num js-line-number" data-line-number="185"></td>
        <td id="LC185" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-v">this</span>.<span class="pl-smi">iframe</span>.<span class="pl-smi">src</span> <span class="pl-k">=</span> <span class="pl-v">this</span>.<span class="pl-smi">url</span> <span class="pl-k">=</span> <span class="pl-v">this</span>.<span class="pl-en">getUrl</span>();</span></td>
      </tr>
      <tr>
        <td id="L186" class="blob-num js-line-number" data-line-number="186"></td>
        <td id="LC186" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-v">this</span><span class="pl-c1">.iframe</span>.<span class="pl-en">onload</span> <span class="pl-k">=</span> <span class="pl-k">function</span>() {</span></td>
      </tr>
      <tr>
        <td id="L187" class="blob-num js-line-number" data-line-number="187"></td>
        <td id="LC187" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-smi">Dz</span>.<span class="pl-smi">view</span> <span class="pl-k">=</span> <span class="pl-v">this</span>.<span class="pl-smi">contentWindow</span>;</span></td>
      </tr>
      <tr>
        <td id="L188" class="blob-num js-line-number" data-line-number="188"></td>
        <td id="LC188" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-smi">Dz</span>.<span class="pl-en">postMsg</span>(<span class="pl-smi">Dz</span>.<span class="pl-smi">view</span>, <span class="pl-s"><span class="pl-pds">&quot;</span>REGISTER<span class="pl-pds">&quot;</span></span>);</span></td>
      </tr>
      <tr>
        <td id="L189" class="blob-num js-line-number" data-line-number="189"></td>
        <td id="LC189" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    }</span></td>
      </tr>
      <tr>
        <td id="L190" class="blob-num js-line-number" data-line-number="190"></td>
        <td id="LC190" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L191" class="blob-num js-line-number" data-line-number="191"></td>
        <td id="LC191" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  </span></td>
      </tr>
      <tr>
        <td id="L192" class="blob-num js-line-number" data-line-number="192"></td>
        <td id="LC192" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-c1">Dz</span>.<span class="pl-en">toggleContent</span> <span class="pl-k">=</span> <span class="pl-k">function</span>() {</span></td>
      </tr>
      <tr>
        <td id="L193" class="blob-num js-line-number" data-line-number="193"></td>
        <td id="LC193" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-v">this</span>.<span class="pl-en">postMsg</span>(<span class="pl-v">this</span>.<span class="pl-smi">view</span>, <span class="pl-s"><span class="pl-pds">&quot;</span>TOGGLE_CONTENT<span class="pl-pds">&quot;</span></span>);</span></td>
      </tr>
      <tr>
        <td id="L194" class="blob-num js-line-number" data-line-number="194"></td>
        <td id="LC194" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L195" class="blob-num js-line-number" data-line-number="195"></td>
        <td id="LC195" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  </span></td>
      </tr>
      <tr>
        <td id="L196" class="blob-num js-line-number" data-line-number="196"></td>
        <td id="LC196" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-c1">Dz</span>.<span class="pl-en">onhashchange</span> <span class="pl-k">=</span> <span class="pl-k">function</span>() {</span></td>
      </tr>
      <tr>
        <td id="L197" class="blob-num js-line-number" data-line-number="197"></td>
        <td id="LC197" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-v">this</span>.<span class="pl-en">loadIframe</span>();</span></td>
      </tr>
      <tr>
        <td id="L198" class="blob-num js-line-number" data-line-number="198"></td>
        <td id="LC198" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L199" class="blob-num js-line-number" data-line-number="199"></td>
        <td id="LC199" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  </span></td>
      </tr>
      <tr>
        <td id="L200" class="blob-num js-line-number" data-line-number="200"></td>
        <td id="LC200" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-c1">Dz</span>.<span class="pl-en">back</span> <span class="pl-k">=</span> <span class="pl-k">function</span>() {</span></td>
      </tr>
      <tr>
        <td id="L201" class="blob-num js-line-number" data-line-number="201"></td>
        <td id="LC201" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-v">this</span>.<span class="pl-en">postMsg</span>(<span class="pl-v">this</span>.<span class="pl-smi">view</span>, <span class="pl-s"><span class="pl-pds">&quot;</span>BACK<span class="pl-pds">&quot;</span></span>);</span></td>
      </tr>
      <tr>
        <td id="L202" class="blob-num js-line-number" data-line-number="202"></td>
        <td id="LC202" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L203" class="blob-num js-line-number" data-line-number="203"></td>
        <td id="LC203" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"></span></td>
      </tr>
      <tr>
        <td id="L204" class="blob-num js-line-number" data-line-number="204"></td>
        <td id="LC204" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-c1">Dz</span>.<span class="pl-en">forward</span> <span class="pl-k">=</span> <span class="pl-k">function</span>() {</span></td>
      </tr>
      <tr>
        <td id="L205" class="blob-num js-line-number" data-line-number="205"></td>
        <td id="LC205" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-v">this</span>.<span class="pl-en">postMsg</span>(<span class="pl-v">this</span>.<span class="pl-smi">view</span>, <span class="pl-s"><span class="pl-pds">&quot;</span>FORWARD<span class="pl-pds">&quot;</span></span>);</span></td>
      </tr>
      <tr>
        <td id="L206" class="blob-num js-line-number" data-line-number="206"></td>
        <td id="LC206" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L207" class="blob-num js-line-number" data-line-number="207"></td>
        <td id="LC207" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"></span></td>
      </tr>
      <tr>
        <td id="L208" class="blob-num js-line-number" data-line-number="208"></td>
        <td id="LC208" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-c1">Dz</span>.<span class="pl-en">goStart</span> <span class="pl-k">=</span> <span class="pl-k">function</span>() {</span></td>
      </tr>
      <tr>
        <td id="L209" class="blob-num js-line-number" data-line-number="209"></td>
        <td id="LC209" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-v">this</span>.<span class="pl-en">postMsg</span>(<span class="pl-v">this</span>.<span class="pl-smi">view</span>, <span class="pl-s"><span class="pl-pds">&quot;</span>START<span class="pl-pds">&quot;</span></span>);</span></td>
      </tr>
      <tr>
        <td id="L210" class="blob-num js-line-number" data-line-number="210"></td>
        <td id="LC210" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L211" class="blob-num js-line-number" data-line-number="211"></td>
        <td id="LC211" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"></span></td>
      </tr>
      <tr>
        <td id="L212" class="blob-num js-line-number" data-line-number="212"></td>
        <td id="LC212" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-c1">Dz</span>.<span class="pl-en">goEnd</span> <span class="pl-k">=</span> <span class="pl-k">function</span>() {</span></td>
      </tr>
      <tr>
        <td id="L213" class="blob-num js-line-number" data-line-number="213"></td>
        <td id="LC213" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-v">this</span>.<span class="pl-en">postMsg</span>(<span class="pl-v">this</span>.<span class="pl-smi">view</span>, <span class="pl-s"><span class="pl-pds">&quot;</span>END<span class="pl-pds">&quot;</span></span>);</span></td>
      </tr>
      <tr>
        <td id="L214" class="blob-num js-line-number" data-line-number="214"></td>
        <td id="LC214" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L215" class="blob-num js-line-number" data-line-number="215"></td>
        <td id="LC215" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"></span></td>
      </tr>
      <tr>
        <td id="L216" class="blob-num js-line-number" data-line-number="216"></td>
        <td id="LC216" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-c1">Dz</span>.<span class="pl-en">setCursor</span> <span class="pl-k">=</span> <span class="pl-k">function</span>(<span class="pl-smi">aCursor</span>) {</span></td>
      </tr>
      <tr>
        <td id="L217" class="blob-num js-line-number" data-line-number="217"></td>
        <td id="LC217" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-v">this</span>.<span class="pl-en">postMsg</span>(<span class="pl-v">this</span>.<span class="pl-smi">view</span>, <span class="pl-s"><span class="pl-pds">&quot;</span>SET_CURSOR<span class="pl-pds">&quot;</span></span>, aCursor);</span></td>
      </tr>
      <tr>
        <td id="L218" class="blob-num js-line-number" data-line-number="218"></td>
        <td id="LC218" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L219" class="blob-num js-line-number" data-line-number="219"></td>
        <td id="LC219" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"></span></td>
      </tr>
      <tr>
        <td id="L220" class="blob-num js-line-number" data-line-number="220"></td>
        <td id="LC220" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-c1">Dz</span>.<span class="pl-en">goFullscreen</span> <span class="pl-k">=</span> <span class="pl-k">function</span>() {</span></td>
      </tr>
      <tr>
        <td id="L221" class="blob-num js-line-number" data-line-number="221"></td>
        <td id="LC221" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-k">var</span> requestFullscreen <span class="pl-k">=</span> <span class="pl-v">this</span>.<span class="pl-smi">iframe</span>.<span class="pl-smi">requestFullscreen</span> <span class="pl-k">||</span> <span class="pl-v">this</span>.<span class="pl-smi">iframe</span>.<span class="pl-smi">requestFullScreen</span> <span class="pl-k">||</span> <span class="pl-v">this</span>.<span class="pl-smi">iframe</span>.<span class="pl-smi">mozRequestFullScreen</span> <span class="pl-k">||</span> <span class="pl-v">this</span>.<span class="pl-smi">iframe</span>.<span class="pl-smi">webkitRequestFullScreen</span>;</span></td>
      </tr>
      <tr>
        <td id="L222" class="blob-num js-line-number" data-line-number="222"></td>
        <td id="LC222" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-k">if</span> (requestFullscreen) {</span></td>
      </tr>
      <tr>
        <td id="L223" class="blob-num js-line-number" data-line-number="223"></td>
        <td id="LC223" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-smi">requestFullscreen</span>.<span class="pl-c1">apply</span>(<span class="pl-v">this</span>.<span class="pl-smi">iframe</span>);</span></td>
      </tr>
      <tr>
        <td id="L224" class="blob-num js-line-number" data-line-number="224"></td>
        <td id="LC224" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    } <span class="pl-k">else</span> {</span></td>
      </tr>
      <tr>
        <td id="L225" class="blob-num js-line-number" data-line-number="225"></td>
        <td id="LC225" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-smi">window</span>.<span class="pl-c1">open</span>(<span class="pl-v">this</span>.<span class="pl-smi">url</span> <span class="pl-k">+</span> <span class="pl-s"><span class="pl-pds">&quot;</span>#<span class="pl-pds">&quot;</span></span> <span class="pl-k">+</span> <span class="pl-v">this</span>.<span class="pl-smi">idx</span>, <span class="pl-s"><span class="pl-pds">&#39;</span><span class="pl-pds">&#39;</span></span>, <span class="pl-s"><span class="pl-pds">&#39;</span>width=800,height=600,personalbar=0,toolbar=0,scrollbars=1,resizable=1<span class="pl-pds">&#39;</span></span>);</span></td>
      </tr>
      <tr>
        <td id="L226" class="blob-num js-line-number" data-line-number="226"></td>
        <td id="LC226" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    }</span></td>
      </tr>
      <tr>
        <td id="L227" class="blob-num js-line-number" data-line-number="227"></td>
        <td id="LC227" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L228" class="blob-num js-line-number" data-line-number="228"></td>
        <td id="LC228" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  </span></td>
      </tr>
      <tr>
        <td id="L229" class="blob-num js-line-number" data-line-number="229"></td>
        <td id="LC229" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-c1">Dz</span>.<span class="pl-en">postMsg</span> <span class="pl-k">=</span> <span class="pl-k">function</span>(<span class="pl-smi">aWin</span>, <span class="pl-smi">aMsg</span>) { <span class="pl-c">// [arg0, [arg1...]]</span></span></td>
      </tr>
      <tr>
        <td id="L230" class="blob-num js-line-number" data-line-number="230"></td>
        <td id="LC230" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    aMsg <span class="pl-k">=</span> [aMsg];</span></td>
      </tr>
      <tr>
        <td id="L231" class="blob-num js-line-number" data-line-number="231"></td>
        <td id="LC231" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-k">for</span> (<span class="pl-k">var</span> i <span class="pl-k">=</span> <span class="pl-c1">2</span>; i <span class="pl-k">&lt;</span> <span class="pl-smi">arguments</span>.<span class="pl-c1">length</span>; i<span class="pl-k">++</span>)</span></td>
      </tr>
      <tr>
        <td id="L232" class="blob-num js-line-number" data-line-number="232"></td>
        <td id="LC232" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-smi">aMsg</span>.<span class="pl-c1">push</span>(<span class="pl-en">encodeURIComponent</span>(arguments[i]));</span></td>
      </tr>
      <tr>
        <td id="L233" class="blob-num js-line-number" data-line-number="233"></td>
        <td id="LC233" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-smi">aWin</span>.<span class="pl-en">postMessage</span>(<span class="pl-smi">aMsg</span>.<span class="pl-c1">join</span>(<span class="pl-s"><span class="pl-pds">&quot;</span> <span class="pl-pds">&quot;</span></span>), <span class="pl-s"><span class="pl-pds">&quot;</span>*<span class="pl-pds">&quot;</span></span>);</span></td>
      </tr>
      <tr>
        <td id="L234" class="blob-num js-line-number" data-line-number="234"></td>
        <td id="LC234" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L235" class="blob-num js-line-number" data-line-number="235"></td>
        <td id="LC235" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"></span></td>
      </tr>
      <tr>
        <td id="L236" class="blob-num js-line-number" data-line-number="236"></td>
        <td id="LC236" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-k">function</span> <span class="pl-en">init</span>() {</span></td>
      </tr>
      <tr>
        <td id="L237" class="blob-num js-line-number" data-line-number="237"></td>
        <td id="LC237" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-smi">Dz</span>.<span class="pl-en">init</span>();</span></td>
      </tr>
      <tr>
        <td id="L238" class="blob-num js-line-number" data-line-number="238"></td>
        <td id="LC238" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-smi">window</span>.<span class="pl-smi">onkeydown</span> <span class="pl-k">=</span> <span class="pl-smi">Dz</span>.<span class="pl-smi">onkeydown</span>.<span class="pl-en">bind</span>(Dz);</span></td>
      </tr>
      <tr>
        <td id="L239" class="blob-num js-line-number" data-line-number="239"></td>
        <td id="LC239" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-smi">window</span>.<span class="pl-smi">onhashchange</span> <span class="pl-k">=</span> <span class="pl-smi">Dz</span>.<span class="pl-smi">loadIframe</span>.<span class="pl-en">bind</span>(Dz);</span></td>
      </tr>
      <tr>
        <td id="L240" class="blob-num js-line-number" data-line-number="240"></td>
        <td id="LC240" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-smi">window</span>.<span class="pl-smi">onmessage</span> <span class="pl-k">=</span> <span class="pl-smi">Dz</span>.<span class="pl-smi">onmessage</span>.<span class="pl-en">bind</span>(Dz);</span></td>
      </tr>
      <tr>
        <td id="L241" class="blob-num js-line-number" data-line-number="241"></td>
        <td id="LC241" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L242" class="blob-num js-line-number" data-line-number="242"></td>
        <td id="LC242" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"></span></td>
      </tr>
      <tr>
        <td id="L243" class="blob-num js-line-number" data-line-number="243"></td>
        <td id="LC243" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-smi">window</span>.<span class="pl-smi">onload</span> <span class="pl-k">=</span> init;</span></td>
      </tr>
      <tr>
        <td id="L244" class="blob-num js-line-number" data-line-number="244"></td>
        <td id="LC244" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">&lt;/<span class="pl-ent">script</span>&gt;</span></td>
      </tr>
      <tr>
        <td id="L245" class="blob-num js-line-number" data-line-number="245"></td>
        <td id="LC245" class="blob-code blob-code-inner js-file-line">
</td>
      </tr>
      <tr>
        <td id="L246" class="blob-num js-line-number" data-line-number="246"></td>
        <td id="LC246" class="blob-code blob-code-inner js-file-line">
</td>
      </tr>
      <tr>
        <td id="L247" class="blob-num js-line-number" data-line-number="247"></td>
        <td id="LC247" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">&lt;<span class="pl-ent">script</span>&gt; <span class="pl-c">// Helpers</span></span></td>
      </tr>
      <tr>
        <td id="L248" class="blob-num js-line-number" data-line-number="248"></td>
        <td id="LC248" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-k">if</span> (<span class="pl-k">!</span><span class="pl-smi">Function</span>.<span class="pl-c1">prototype</span>.<span class="pl-smi">bind</span>) {</span></td>
      </tr>
      <tr>
        <td id="L249" class="blob-num js-line-number" data-line-number="249"></td>
        <td id="LC249" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-c1">Function</span>.<span class="pl-c1">prototype</span>.<span class="pl-en">bind</span> <span class="pl-k">=</span> <span class="pl-k">function</span> (<span class="pl-smi">oThis</span>) {</span></td>
      </tr>
      <tr>
        <td id="L250" class="blob-num js-line-number" data-line-number="250"></td>
        <td id="LC250" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"></span></td>
      </tr>
      <tr>
        <td id="L251" class="blob-num js-line-number" data-line-number="251"></td>
        <td id="LC251" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-c">// closest thing possible to the ECMAScript 5 internal IsCallable</span></span></td>
      </tr>
      <tr>
        <td id="L252" class="blob-num js-line-number" data-line-number="252"></td>
        <td id="LC252" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-c">// function </span></span></td>
      </tr>
      <tr>
        <td id="L253" class="blob-num js-line-number" data-line-number="253"></td>
        <td id="LC253" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-k">if</span> (<span class="pl-k">typeof</span> <span class="pl-v">this</span> <span class="pl-k">!==</span> <span class="pl-s"><span class="pl-pds">&quot;</span>function<span class="pl-pds">&quot;</span></span>)</span></td>
      </tr>
      <tr>
        <td id="L254" class="blob-num js-line-number" data-line-number="254"></td>
        <td id="LC254" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-k">throw</span> <span class="pl-k">new</span> <span class="pl-en">TypeError</span>(</span></td>
      </tr>
      <tr>
        <td id="L255" class="blob-num js-line-number" data-line-number="255"></td>
        <td id="LC255" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">        <span class="pl-s"><span class="pl-pds">&quot;</span>Function.prototype.bind - what is trying to be fBound is not callable<span class="pl-pds">&quot;</span></span></span></td>
      </tr>
      <tr>
        <td id="L256" class="blob-num js-line-number" data-line-number="256"></td>
        <td id="LC256" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      );</span></td>
      </tr>
      <tr>
        <td id="L257" class="blob-num js-line-number" data-line-number="257"></td>
        <td id="LC257" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"></span></td>
      </tr>
      <tr>
        <td id="L258" class="blob-num js-line-number" data-line-number="258"></td>
        <td id="LC258" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-k">var</span> aArgs <span class="pl-k">=</span> <span class="pl-smi">Array</span>.<span class="pl-c1">prototype</span>.<span class="pl-smi">slice</span>.<span class="pl-c1">call</span>(arguments, <span class="pl-c1">1</span>),</span></td>
      </tr>
      <tr>
        <td id="L259" class="blob-num js-line-number" data-line-number="259"></td>
        <td id="LC259" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">          fToBind <span class="pl-k">=</span> <span class="pl-v">this</span>,</span></td>
      </tr>
      <tr>
        <td id="L260" class="blob-num js-line-number" data-line-number="260"></td>
        <td id="LC260" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">          <span class="pl-en">fNOP</span> <span class="pl-k">=</span> <span class="pl-k">function</span> () {},</span></td>
      </tr>
      <tr>
        <td id="L261" class="blob-num js-line-number" data-line-number="261"></td>
        <td id="LC261" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">          <span class="pl-en">fBound</span> <span class="pl-k">=</span> <span class="pl-k">function</span> () {</span></td>
      </tr>
      <tr>
        <td id="L262" class="blob-num js-line-number" data-line-number="262"></td>
        <td id="LC262" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">            <span class="pl-k">return</span> <span class="pl-smi">fToBind</span>.<span class="pl-c1">apply</span>( <span class="pl-v">this</span> <span class="pl-k">instanceof</span> fNOP <span class="pl-k">?</span> <span class="pl-v">this</span> <span class="pl-k">:</span> oThis <span class="pl-k">||</span> <span class="pl-c1">window</span>,</span></td>
      </tr>
      <tr>
        <td id="L263" class="blob-num js-line-number" data-line-number="263"></td>
        <td id="LC263" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">                   <span class="pl-smi">aArgs</span>.<span class="pl-c1">concat</span>(<span class="pl-smi">Array</span>.<span class="pl-c1">prototype</span>.<span class="pl-smi">slice</span>.<span class="pl-c1">call</span>(arguments)));</span></td>
      </tr>
      <tr>
        <td id="L264" class="blob-num js-line-number" data-line-number="264"></td>
        <td id="LC264" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">          };</span></td>
      </tr>
      <tr>
        <td id="L265" class="blob-num js-line-number" data-line-number="265"></td>
        <td id="LC265" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"></span></td>
      </tr>
      <tr>
        <td id="L266" class="blob-num js-line-number" data-line-number="266"></td>
        <td id="LC266" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-c1">fNOP</span>.<span class="pl-c1">prototype</span> <span class="pl-k">=</span> <span class="pl-v">this</span>.<span class="pl-c1">prototype</span>;</span></td>
      </tr>
      <tr>
        <td id="L267" class="blob-num js-line-number" data-line-number="267"></td>
        <td id="LC267" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-c1">fBound</span>.<span class="pl-c1">prototype</span> <span class="pl-k">=</span> <span class="pl-k">new</span> <span class="pl-en">fNOP</span>();</span></td>
      </tr>
      <tr>
        <td id="L268" class="blob-num js-line-number" data-line-number="268"></td>
        <td id="LC268" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"></span></td>
      </tr>
      <tr>
        <td id="L269" class="blob-num js-line-number" data-line-number="269"></td>
        <td id="LC269" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">      <span class="pl-k">return</span> fBound;</span></td>
      </tr>
      <tr>
        <td id="L270" class="blob-num js-line-number" data-line-number="270"></td>
        <td id="LC270" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    };</span></td>
      </tr>
      <tr>
        <td id="L271" class="blob-num js-line-number" data-line-number="271"></td>
        <td id="LC271" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }</span></td>
      </tr>
      <tr>
        <td id="L272" class="blob-num js-line-number" data-line-number="272"></td>
        <td id="LC272" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"></span></td>
      </tr>
      <tr>
        <td id="L273" class="blob-num js-line-number" data-line-number="273"></td>
        <td id="LC273" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  <span class="pl-k">var</span> $ <span class="pl-k">=</span> (<span class="pl-c1">HTMLElement</span>.<span class="pl-c1">prototype</span>.<span class="pl-en">$</span> <span class="pl-k">=</span> <span class="pl-k">function</span>(<span class="pl-smi">aQuery</span>) {</span></td>
      </tr>
      <tr>
        <td id="L274" class="blob-num js-line-number" data-line-number="274"></td>
        <td id="LC274" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">    <span class="pl-k">return</span> <span class="pl-v">this</span>.<span class="pl-en">querySelector</span>(aQuery);</span></td>
      </tr>
      <tr>
        <td id="L275" class="blob-num js-line-number" data-line-number="275"></td>
        <td id="LC275" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">  }).<span class="pl-en">bind</span>(<span class="pl-c1">document</span>);</span></td>
      </tr>
      <tr>
        <td id="L276" class="blob-num js-line-number" data-line-number="276"></td>
        <td id="LC276" class="blob-code blob-code-inner js-file-line"><span class="pl-s1"></span></td>
      </tr>
      <tr>
        <td id="L277" class="blob-num js-line-number" data-line-number="277"></td>
        <td id="LC277" class="blob-code blob-code-inner js-file-line"><span class="pl-s1">&lt;/<span class="pl-ent">script</span>&gt;</span></td>
      </tr>
</table>

  </div>

</div>

<a href="#jump-to-line" rel="facebox[.linejump]" data-hotkey="l" style="display:none">Jump to Line</a>
<div id="jump-to-line" style="display:none">
  <!-- </textarea> --><!-- '"` --><form accept-charset="UTF-8" action="" class="js-jump-to-line-form" method="get"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
    <input class="linejump-input js-jump-to-line-field" type="text" placeholder="Jump to line&hellip;" aria-label="Jump to line" autofocus>
    <button type="submit" class="btn">Go</button>
</form></div>

  </div>
  <div class="modal-backdrop"></div>
</div>

    </div>
  </div>

    </div>

        <div class="container">
  <div class="site-footer" role="contentinfo">
    <ul class="site-footer-links right">
        <li><a href="https://status.github.com/" data-ga-click="Footer, go to status, text:status">Status</a></li>
      <li><a href="https://developer.github.com" data-ga-click="Footer, go to api, text:api">API</a></li>
      <li><a href="https://training.github.com" data-ga-click="Footer, go to training, text:training">Training</a></li>
      <li><a href="https://shop.github.com" data-ga-click="Footer, go to shop, text:shop">Shop</a></li>
        <li><a href="https://github.com/blog" data-ga-click="Footer, go to blog, text:blog">Blog</a></li>
        <li><a href="https://github.com/about" data-ga-click="Footer, go to about, text:about">About</a></li>
        <li><a href="https://github.com/pricing" data-ga-click="Footer, go to pricing, text:pricing">Pricing</a></li>

    </ul>

    <a href="https://github.com" aria-label="Homepage">
      <span class="mega-octicon octicon-mark-github " title="GitHub "></span>
</a>
    <ul class="site-footer-links">
      <li>&copy; 2015 <span title="0.14962s from github-fe120-cp1-prd.iad.github.net">GitHub</span>, Inc.</li>
        <li><a href="https://github.com/site/terms" data-ga-click="Footer, go to terms, text:terms">Terms</a></li>
        <li><a href="https://github.com/site/privacy" data-ga-click="Footer, go to privacy, text:privacy">Privacy</a></li>
        <li><a href="https://github.com/security" data-ga-click="Footer, go to security, text:security">Security</a></li>
        <li><a href="https://github.com/contact" data-ga-click="Footer, go to contact, text:contact">Contact</a></li>
        <li><a href="https://help.github.com" data-ga-click="Footer, go to help, text:help">Help</a></li>
    </ul>
  </div>
</div>



    
    
    

    <div id="ajax-error-message" class="flash flash-error">
      <span class="octicon octicon-alert"></span>
      <button type="button" class="flash-close js-flash-close js-ajax-error-dismiss" aria-label="Dismiss error">
        <span class="octicon octicon-x"></span>
      </button>
      Something went wrong with that request. Please try again.
    </div>


      <script crossorigin="anonymous" integrity="sha256-7460qJ7p88i3YTMH/liaj1cFgX987ie+xRzl6WMjSr8=" src="https://assets-cdn.github.com/assets/frameworks-ef8eb4a89ee9f3c8b7613307fe589a8f5705817f7cee27bec51ce5e963234abf.js"></script>
      <script async="async" crossorigin="anonymous" integrity="sha256-S2uOfRHrt7zoUSbTtBMMgAQfKubV1u+JAajAw/fLgNI=" src="https://assets-cdn.github.com/assets/github-4b6b8e7d11ebb7bce85126d3b4130c80041f2ae6d5d6ef8901a8c0c3f7cb80d2.js"></script>
      
      
      
    <div class="js-stale-session-flash stale-session-flash flash flash-warn flash-banner hidden">
      <span class="octicon octicon-alert"></span>
      <span class="signed-in-tab-flash">You signed in with another tab or window. <a href="">Reload</a> to refresh your session.</span>
      <span class="signed-out-tab-flash">You signed out in another tab or window. <a href="">Reload</a> to refresh your session.</span>
    </div>
  </body>
</html>

