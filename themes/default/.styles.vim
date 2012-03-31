let SessionLoad = 1
if &cp | set nocp | endif
let s:cpo_save=&cpo
set cpo&vim
imap <C-Tab> :tabnext
imap <C-Right> :tabnext
imap <C-S-Tab> :tabprevious
imap <C-Left> :tabprevious
vmap  :tabnew
nmap  :tabnew
omap  :tabnew
nmap SSQ :wa:mksession! ../.styles.vim:qa
nmap SO :wa:so ./
nmap SSA :wa:mksession! ../.styles.vim
nmap gx <Plug>NetrwBrowseX
vmap <C-Tab> :tabnext
vmap <C-Right> :tabnext
vmap <C-S-Tab> :tabprevious
vmap <C-Left> :tabprevious
nnoremap <silent> <Plug>NetrwBrowseX :call netrw#NetrwBrowseX(expand("<cWORD>"),0)
nmap <C-Tab> :tabnext
nmap <C-Right> :tabnext
nmap <C-S-Tab> :tabprevious
nmap <C-Left> :tabprevious
omap <C-Tab> :tabnext
omap <C-Right> :tabnext
omap <C-S-Tab> :tabprevious
omap <C-Left> :tabprevious
imap  :tabnew
imap <silent> [6~ <PageDown>
imap <silent> [5~ <PageUp>
imap <silent> OF <End>
imap <silent> OH <Home>
imap <silent> OD <Left>
imap <silent> OC <Right>
imap <silent> OB <Down>
imap <silent> OA <Up>
map é i r
let &cpo=s:cpo_save
unlet s:cpo_save
set autoindent
set backspace=2
set backup
set backupdir=./.backup,~/.backup,.,/tmp
set cindent
set confirm
set fileencodings=ucs-bom,utf-8,default,latin1
set fillchars=vert:\ ,stl:\ ,stlnc:\\
set formatoptions=tcrqn
set helplang=en
set hidden
set history=1000
set incsearch
set iskeyword=@,48-57,_,192-255,_,$,@,%,#,-
set laststatus=2
set lazyredraw
set makeef=make.err
set mouse=a
set printoptions=paper:letter
set report=0
set ruler
set runtimepath=~/.vim,~/.vim/bundle/vim-jade,~/.vim/bundle/vim-stylus,/var/lib/vim/addons,/usr/share/vim/vimfiles,/usr/share/vim/vim73,/usr/share/vim/vimfiles/after,/var/lib/vim/addons/after,~/.vim/after
set shiftwidth=4
set showmatch
set smartindent
set smarttab
set softtabstop=4
set statusline=%F%m%r%h%w
set suffixes=.bak,~,.swp,.o,.info,.aux,.log,.dvi,.bbl,.blg,.brf,.cb,.ind,.idx,.ilg,.inx,.out,.toc
set tabstop=4
set viminfo='100,<50,s10,h,!
set whichwrap=b,s,<,>,h,l
let s:so_save = &so | let s:siso_save = &siso | set so=0 siso=0
let v:this_session=expand("<sfile>:p")
silent only
cd ~/www/yh/themes/default/sass
if expand('%') == '' && !&modified && line('$') <= 1 && getline(1) == ''
  let s:wipebuf = bufnr('%')
endif
set shortmess=aoO
badd +1 sass/styles.styl
badd +0 styles.styl
args sass/styles.styl
edit styles.styl
set splitbelow splitright
set nosplitbelow
set nosplitright
wincmd t
set winheight=1 winwidth=1
argglobal
xnoremap <buffer> <silent> \a} `>a}`<i{
xnoremap <buffer> <silent> \a{ `>a}`<i{
xnoremap <buffer> <silent> \a) `>a)`<i(
xnoremap <buffer> <silent> \a( `>a)`<i(
xnoremap <buffer> <silent> \a' `>a'`<i'
xnoremap <buffer> <silent> \a] `>a]`<i[
xnoremap <buffer> <silent> \a[ `>a]`<i[
xnoremap <buffer> <silent> \a" `>a"`<i"
xnoremap <buffer> <silent> \a` `>a``<i`
setlocal keymap=
setlocal noarabic
setlocal autoindent
setlocal nobinary
setlocal bufhidden=
setlocal buflisted
setlocal buftype=
setlocal cindent
setlocal cinkeys=0{,0},0),:,0#,!^F,o,O,e
setlocal cinoptions=
setlocal cinwords=if,else,while,do,for,switch
setlocal colorcolumn=
setlocal comments=
setlocal commentstring=//\ %s
setlocal complete=.,w,b,u,t,i
setlocal concealcursor=
setlocal conceallevel=0
setlocal completefunc=
setlocal nocopyindent
setlocal cryptmethod=
setlocal nocursorbind
setlocal nocursorcolumn
setlocal nocursorline
setlocal define=
setlocal dictionary=
setlocal nodiff
setlocal equalprg=
setlocal errorformat=
setlocal noexpandtab
if &filetype != 'stylus'
setlocal filetype=stylus
endif
setlocal foldcolumn=0
setlocal foldenable
setlocal foldexpr=0
setlocal foldignore=#
set foldlevel=100
setlocal foldlevel=100
setlocal foldmarker={{{,}}}
set foldmethod=indent
setlocal foldmethod=indent
setlocal foldminlines=1
setlocal foldnestmax=20
setlocal foldtext=foldtext()
setlocal formatexpr=
setlocal formatoptions=tcqnr
setlocal formatlistpat=^\\s*\\d\\+[\\]:.)}\\t\ ]\\s*
setlocal grepprg=
setlocal iminsert=0
setlocal imsearch=0
setlocal include=
setlocal includeexpr=
setlocal indentexpr=GetStylusIndent()
setlocal indentkeys=o,O,*<Return>,},],0),!^F
setlocal noinfercase
setlocal iskeyword=@,48-57,_,192-255,_,$,@,%,#,-
setlocal keywordprg=
setlocal nolinebreak
setlocal nolisp
setlocal nolist
setlocal makeprg=
setlocal matchpairs=(:),{:},[:],<:>
setlocal modeline
setlocal modifiable
setlocal nrformats=octal,hex
set number
setlocal number
setlocal numberwidth=4
setlocal omnifunc=htmlcomplete#CompleteTags
setlocal path=
setlocal nopreserveindent
setlocal nopreviewwindow
setlocal quoteescape=\\
setlocal noreadonly
setlocal norelativenumber
setlocal norightleft
setlocal rightleftcmd=search
setlocal noscrollbind
setlocal shiftwidth=4
setlocal noshortname
setlocal smartindent
setlocal softtabstop=4
setlocal nospell
setlocal spellcapcheck=[.?!]\\_[\\])'\"\	\ ]\\+
setlocal spellfile=
setlocal spelllang=en
setlocal statusline=
setlocal suffixesadd=
setlocal swapfile
setlocal synmaxcol=3000
if &syntax != 'stylus'
setlocal syntax=stylus
endif
setlocal tabstop=4
setlocal tags=
setlocal textwidth=0
setlocal thesaurus=
setlocal noundofile
setlocal nowinfixheight
setlocal nowinfixwidth
set nowrap
setlocal nowrap
setlocal wrapmargin=0
let s:l = 1 - ((0 * winheight(0) + 11) / 22)
if s:l < 1 | let s:l = 1 | endif
exe s:l
normal! zt
1
normal! 0
tabnext 1
if exists('s:wipebuf')
  silent exe 'bwipe ' . s:wipebuf
endif
unlet! s:wipebuf
set winheight=1 winwidth=20 shortmess=filnxtToO
let s:sx = expand("<sfile>:p:r")."x.vim"
if file_readable(s:sx)
  exe "source " . fnameescape(s:sx)
endif
let &so = s:so_save | let &siso = s:siso_save
doautoall SessionLoadPost
unlet SessionLoad
" vim: set ft=vim :
