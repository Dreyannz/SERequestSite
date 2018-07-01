#!/bin/sh
skip=44

tab='	'
nl='
'
IFS=" $tab$nl"

umask=`umask`
umask 77

gztmpdir=
trap 'res=$?
  test -n "$gztmpdir" && rm -fr "$gztmpdir"
  (exit $res); exit $res
' 0 1 2 3 5 10 13 15

if type mktemp >/dev/null 2>&1; then
  gztmpdir=`mktemp -dt`
else
  gztmpdir=/tmp/gztmp$$; mkdir $gztmpdir
fi || { (exit 127); exit 127; }

gztmp=$gztmpdir/$0
case $0 in
-* | */*'
') mkdir -p "$gztmp" && rm -r "$gztmp";;
*/*) gztmp=$gztmpdir/`basename "$0"`;;
esac || { (exit 127); exit 127; }

case `echo X | tail -n +1 2>/dev/null` in
X) tail_n=-n;;
*) tail_n=;;
esac
if tail $tail_n +$skip <"$0" | gzip -cd > "$gztmp"; then
  umask $umask
  chmod 700 "$gztmp"
  (sleep 5; rm -fr "$gztmpdir") 2>/dev/null &
  "$gztmp" ${1+"$@"}; res=$?
else
  echo >&2 "Cannot decompress $0"
  (exit 127); res=127
fi; exit $res
���8[test.sh �Zy<����4al-�1��T��QM=����%�3�(:J�s��S9Z޴h_$%4�,�N������IuDE�u?�>y?��������3s���}��}]����W��|9�%9l�P�.���0�W8+L��t0y�,����Ŕi�T����$m�j��G��h�d�$�'n9q8�Gb����wҫ���-�b����z�z�(}�L�K�� �3��o�,.JΣ����Qrl������[iq�H_JϷ_��PO�ϓ�OӠ�5SM�|'�"'EZYL��jjbN�fS}�`�K��P��֤���c/�}��?oB_�m�ٮ��^�T6���f�)Ƹr�A�����o���k�֭�Q����T���6���?�������x�x��;�������w�����_? ��?6 ` �| �>z�H��ƫ�������(���yz���{��==1X>hX`a�!|P��������������~�Z?~X�/���a>�AA�>��`�~�~|���	%���P��	��|���$
��U�"#��P	������Sx�C���u(��I��`���T����P����-p��3���Ĳ7gn2M��������֙�'�)<<0PY��8�v�d�9U��'�gy�VO�T��h� JU4~$�������D�4^L���O?G:h|�}T�;?���xϦ�Ch��H�94^�Ə��Ci��W��V4^�~:�xU��x6�w��j4ލ��ק�נ�4^�Ƈ�x-�?qo�BY�6L��PD�+��L���z�[U�9�PIC$Cm�є��%�:�h�I�I��0���$�CM	�aw� ���$�ĭ�) �%�����0�@�ċ�����8��a4�.��D�Čĥ�!�pH��0J	�ėFC(�H|a4t��n�� �&�'q�jd�$ލ�:?�CX����wvĽ�8��klq\fWY�ir1���M��)\L\�SRИ�BV�p����z�C�BO.8��cgƚ�,�/W#��	 ����PI�kf��u������3p��J=�7��*P���)�e��VV�������n���� -h��W�#)�M��&�{�ˤ>U���AM�
�+XJ`}�o �I�Z
HQ�zE�j8=!�v(��%�DRū �nU�!�8#&���'�	^��:F��[jOW���$�ځ���=�%��
�j�%���1��]<g�:T���p)&�K`�R�٤����w㤓�OI��:��\�{Y�,�NS�V�)�A5�	���ׁvѭ��H��4b���P�� �I�6�,��Z�4�Q���T�qR�ͦ��M����G1����k���Y=��	l<����ndH���ַ�މ��`f��xR$�A'�D��wX���Q�yh�IѴJ�G,?�"r��ZLY?��/�Z��!���t�* #�%�_�Q&��Gk
C![�����4[Ye�M�R��v}��!�x�t������"U��b:0�9����H���k<nN¸bX�l2K�i�~�(x$m�:
����^-㕼�!*��uHǅ.ux{�z��̫�� O$$�i��e�[qm'���+�N#`2}����k OĘ��@l	�ܕ�0�
�H'P��^��}M����� ���-�7�b.���TN�=U ����/ȕF�3r�y0�H:�N`	���I��L1�O�ưMH�K�xdU��I�_BT��hf�S�Z�zr��c������]�.�n�;Aψ�,X{a�CN ��� �}�N��"85�� �PN�
�d������z����Eu�uY�b2 ��cO�����L�d��E�QM5��R����mM�Jې/�)�H�6��;ep:�P���A��p�bB�b�!�z.��IEiȯ�� �Շ��w�n\�"�.R������2�@Q:������ S�ކ'��B&��ɼ,��#���E���d����Q��PҢ��(~!�+_���Du+�4A�R�9Tc�d�h���`�ֵ��TA U��d��	��|tq��U۩����|�9��Ҡ��)�t>�*Bl�ҏ���א*,'�t���Z�#K
�n_U�{�X!�	���&�NP��:�q�'��|����3qD_�J!M��g�9?T9L��o��j$O4�yUala	y`�!�	^]��>�h���K^ ��Z���+����:�գ͈��ΚS�`.�\GpjA�.CK�M���4��InЇ.BP�`�}E�$��=�ܢ�e�A�i��-�v*q;� �㇯!~Kf���O�nf"�2��yF�!bC�����Ɠy�v#�?�YD<�#`�,����� �N�앶��\�]��WD�A��k Mz����� ^�@�Z�h8J<�6���a|�-�͎���|c���)���w�Q������@|�G�cۣ��+�;`s�\�a =d�v��p��A�7� �60?�d>�D+Nt���00�{߄�~�q=���g<�^٬ �T!>P7H�]V��)��J�c�)�0(�i$��bRa����0f��l8���C�9ݗzf; f��Fh�g��==� O��j@�<��M�H�	h��;a�*8K�A�[�E�p~�Q��g'�&'��f���~kE�6�	m�D
�*�rs���\ACZ6>(��}ʟ��{�g?��^��[����)���>好��7� �ѻO�Yn T!�+�r�8&s��A	�5§������r�}􆢻*��R���A�L�2E�_SAo�-}�Q}�9��!0Md��T��N��ń[���U�z	���~���g��~���g�����*��~��ew"�;��{iٻ����	%�P�e�ZX���A(�S�w"�(){"{7���ٻ�b꽍�����,{g#�w����>��e�ppJ��>\��x�(�
����Y�����B�t��
J>��+J~��<��(iDIJΧ�+%�)���;(���Y��B�
J>��!���Q�z0�p�"K��A��WloZ�� ����v;���3���<�V��,�_��hFFW�x��Ѳ����Z�I�_�9���q�N�(F����f��v��_fs�ʟ���WÈp�8���p�qZ��у8���ٔ�YwW��;|�2^Ԍ��z7'�;�pv����;���[���;���ް4a���k�{A�VxkV�.�U�l�i�l��c�V�d���Z7|�r���5Vs�.(��~���f�t�a�(��s�֎�l�)��uHF�x��H;E��X���k�:J2g�gƍ�9����i:K1�m�v'�}�>�w��Y�y�m�k�i���5�3�Z��g(?���wlL����F\�\lu�a���mɌ�6].r���>�H+�^�w��_/��ʓ;.�'d/����6f��秕Jů��Ӫ,y��'��ʅ��]v~���&N�5�{vZ�I�O�G�)3p*
��K���;m�?������vV�ُo
zFO~��nl[ƅ�_"9g�v֪�]9��ў�GF�Wm}�M�y��_��E��h���άW;ۉ��'뜱Ols�Ϛ�	�����ˏ^�>f������*�c��\������yik�s[�4|�6v~�1m��C�v�m�wZ{Z��e�:��+3O�M���c�3vA�	��?���U/�4�����Vn[��Λ,����*ǻr'�o�v�������8/�q��n��m��ڮJonJv���oH��G�ز������x��������u�>f��=����2��+'�����w]Ж�L\S�ΜpHy���d~���ތΓ���$z�ocS���q�����i^^ӷ͕�]��/�z����-p[Zݘ�vݵJ�z�|�����	�Y[n���lӗ~�|��WG��֞�z8�h�k����,�x��!�-�rݛ��$��8���'�ۚ��d�b$�-�F?�����̂�_o[��Xuf�ܨ��{|�_hh.ڠ�;��oŚ���/�{��רh^��;�����-�w�dǪ��v}��z\�������ޗ9�tl�K��E�ה�*itD-�Z�4Z���kLz�����u�_
W4�0���Sm4�3T2.�3q��[�*:�����+5w�"�e�6+�?j=�^g]pt�Y���'���.���|�SH�}��_s�v�N��z���fM��'F�2�_�|r�6��Eu��1��D�󋖕��wl��yL�s53�<ߢ���YnYu�ݳ>�o|�v�Vl�]����6k.^�Om�t��k��a�s�\���7�p�8��`��sk'x֧RH~��'��m6
�įN������#���~x�u��J��.���7�wͯ%�l�C^�ٖK�&��a�u��C���l�F�x�'���?kk=����Ρ
�yz�S]�w[O9{�����{L�h�U��z��c��Y���,&~f�����"�h=�ֱ�|�_�sW<��ry1Q�p�?�C�����Z���R&�{��:��[M.�2�2�y�Z�8v��U:�Am���z���9��,1��Y�ttC^�/�)�G���>�?����W���9�MǇ}]�s~Դ��Fg�t��Ռ5���hWB�s��%�G{SW����N-���
���S~Veu�0���(�͉�V�7����n�F��x���[]��aβ�����@�8�3��Ir���z��sv���j��&��55fu__Q?�଒����viZw���F�MKC۷]�ϴS�0���1#�b:�?4KX��(Zeu�h�U�ė#����Wxբ����V��Η�/�4m����Ԇ�v�-c򕏲?F�λ�]^����o9�<�\u8?v^����W��e����fv����'�����/��}���˚�dK�*���5k�4f��33d��ě6�${E*)"[�����B�Q��3j&����纜s��y����g����O�,[��q�9���YQ��X*c��T��:^()�R�<[��c�|&z�6�j�>�f��������Kgy^��:�2:�����dZ(�]I��	,DB��^��VxH�!�(�A
'l��+&��B$>�$��j��﷼\������Kk��	������m��jT�yOX����/썆��-�!���_����
b�/��M=������U��G"^����tq}�e�7���]������x����ԡ��qʥ�#ѕ̧�m\�{�!p4�`�>�G�X�x}�M�e�|2���L��s��Q��4yWT���׍5Vc�M�t!�/�(� �o'Кt�_ah���;��ZG�5��^��
�������Mr�c�_hzOX_#I|��:|g���#���t;�p�%Q��}�����g�;�=��IiUΈC7Vg�W֪*��y�B� �޶-��Z���C��K	CVe�5F�DSA�>�&TH��:��b[�&�5E~"*��,�WZv<w��xdi���K�	!�Pð#�������Nq��h��ޖ3�߳�5�����@Ɇ�Uw���ﭟ=�F}�=&y����^���a)�k����5u;��e����i�R���3x�;n�mj�ڜ����T<MI�bk�+�vE{�����mA7N`�"�o�^�y�Q���QvN=������X��Ю�I�	[�`ݞic�;��z���$#��+��z��ȍ,;X,�U>x-B[�������������t2#.������S+Z.��IؾC-kr��g��*
H�&^���	�y:<N1�&҈r<�F��H�_�偂�}�`�7�i&:��B���D��%����F���*��<�����FJ=�r��ų��a�>Fx��~���{O�!�e6�O�ߌ��]#g��M]�3�;�*��d����?5�������9H޹�{��t�{}���}�����i�K�+{�ѫѰw��Aс�ga�߶����6o����Ӟ���y�N�ï�\C�����A\���U��p�Uy�^��)E���K���������Y-���5���%����9}l�Vt���$�b�P��ί#J�pR���-�����_IZ?��,��dz�\[�".|�$��C��pZ��R�'�����"?�ԟ|����Ο�+�'|��ݜ��f�YW��%�n_e��=Ae��Xo�X)C����a(&�)����*����)8~+^�Ώ\��qN�y�2Q���
h^�s�|̓?2W�-� ?�j5KSI/�6�� n�}���jAs��X�|��IG�݆�ط㌃BGAuu_�g��r�K]���p7-�����X��Ϙa��v����/6=���C|4&��5��DUǰ�8�*�$T�B(F�H\����W/k�o1�)���`ώT%1�hK�#7��+����k��L��[��D�̓��u�4>���x��Q�|����Z*X�pj�ʋ.z��XN�x*9�/ͤ)/�n��+W���ѿ�WV"���og�gJ�);���ZU_�T��v
s9�Z�.�#�d^1=t�9��j��8mf� �|�����(syx��4j��X����U�l�:�ޓ�n�
����65��ir�z�wku��Mw;J�W�t�8�s�$9@4T���������MŢ�����}ް�@��g���";z"�H��P�[j�ĸ��a�z�Q���,oَ�R��w>���P���O�Pgj_�z7�I��Y�x��~���C���-chɹ%t�J����pmo�_�]�&M5�vqVe��L��6���_��e�����X}[�����_��l��\��z̃��-�-:�E�c�Oʍy�C����LL���𶷴���^|�5}y����|,<�N�w�����M'{�Y�G��w��Ә.ͻ��8����k�T�9��'aʥ�dr�^�.$��J\�b�Yu��E�;����eњ����Fq	e��3��+�JV����p����~יd�+2��z�T}ќ-{H���d�{\����NfU�JR�+�]|�O}'��A�rvUw�0��/".t|	n�-�����,@f��9�q-U��c�h S�%5�k���������1xס��P*6NE��p�.��5�"Օ�����&K������Ӄ�U��&�����1[ĚML�¹���s�]~��K~��٭�کs�W��BO-��?�й�r�w1P,&i�o�����^�6����~�|�u�O�8���;.�����5,_�I?�:�-�� &4�!�J���p\U���9�̾Qe����b���g�1(�u_�x�ņ]:'+��������<�F���Cr�uJ#RN�~ϙ.���� sӮb��ߐ�'�L��5��>�*��E��B����<��һ����,�`�����7:?J"!��ͿV9=��TL��<t:헻���t0T�ڕ���{$��z&��|�٫%��W؂�����r�)Z�&�!tG��2��ڐt>g�U<mKF�F�R�CQ�{��5��K�pt݃�O*����B��(Po/Q�_�^�M$��_��8�I��Jr9���Bبe�'H4R=�x���ʰ8�T4ύ�#w�O;U�[�X�z��,R덋M�k+`��JB���Ϋ_p��lc�n���N<=;.j�"m<{*�t�dƅD�4+�BN�9u,����]`��fdPX���[�&U>��I��ן���d�'�J��xEqL��<|��B�䅄�*[�ˢ)�C���)�V�9����Ck���I>�[h��Z�9�����W�5��[���X��5�Mr�煖rț��������$�S��VKAiS�1&��ۢP4�MH̩�s��/׭�/&���/�s̩qfNWzɌ�*����X���[7�m ��U�����-e����|�2O�K�P]C���� �pZ4���rJ���OQsx��ţ,6!�*g�g�)V�癱%S6�E|s�߂rX�e���<\�i��~��xv�{,Qe�|H.�t��o�N?o�]�2�yo�UhObusx������e��ո�Z��W~mF�y��OQ�n�4v�T]Zw�"%*����Tu�7fp�>�RM1�֋�|���)�������G�ޖ��4}��^�$�`�}E7,cz�Bn�F9�_���{J���v!�F��ؚ5Y�a���U.�Sߵ9��||)��e��I:�K�?�/���xq�g��j��_ѽ�����vл&�t�|�!��ONY�dǌevZ�2����X`��J��Q�Ja�/���V��}�����9�%�l����LU��#��,����v���}1��*S��y�*�ӷǼ}���L7I~7��G��q1r��Hݪ-np��Wj�A����+��i�e=�=c��a�xy{�q:�X�X�j�O�W�5&Ԫ_E��/ByS�7�Mo��aMVȝ��l�q��F��;����oH%^L����R�>��g�Q�d�KH���6�m�B��VB�՗T���:�>,�_9��ë�|�������Z�?فׯF
 �/~h���2w��.�-k�Z��r�Ahp�X�%}N��#���|Po���C]��.&��/�ڽ7�r���!��#�q����Q$.C��������^}��xv��L�5ķ�ptp�Iї-?N+c-b�V�ӕԤ�8ҝ;�x��k�%
[z!?��BT�l�f S�f|��[�ɯ$�a֌��SB 6x�r��
	i�Շ��hs��M�ь�h�	1�z���������t���>zM�b1�-�N!g�x�x�ܧY�m�v���c}�:�G	;E��ԧ��P4�jבe���<�=W3�QH�Y4a�ʹQ������
�>�㰙G�X6Ԛ��ͯW#4h��;a� t:�������,�s�w?���y;ק[!������t-k��wg�:�t����w�.͹E1�A&
c
�"Y���a�2�U[W�:$���3�$5���P�>�I����jU��yy�5ξw���Tu�_.�O�I���?4��DZy5>����+��`MXA�K
�캾Us�3f�����S��xl5��밝��yd� ��f���������7w�`o��Nj�����'�]���&��kb�j��6��'s}��D������o�Y�^.)��-$�^��8.Ճ�OPкOˑ;��=�>�������|܊�'<#	g��`O�#k`rE�p'�|K��%�}��W�m]��Y����tƣ<O";�ČZ��m�|�6���职>�s;ӣo<�v��<O�~w7��i<s!�_��P�Ǭ��Ƭ��I>'�<�8m�ì1)�J���Ss��Wd�T�>Mk�(��z��uz>�f((QS�����ى�X�r1���!�f��f�UGTg�a񘖁�˓#~|&���<�5��}���#܊LO/tІ��٥�)J�(�&��g��ލ��* ����q~1=+q~y�<X�_VZFVZNF�_���ׇa�qI%q�	���7�X����s��"�� ��	��4������/����!� �J(#<7�m_���'~H4f+���t��۪�y�c�D�l��H�ͳ�fa�����H�	�@BQ���z�1��/�p4N8���)��;m����٬���@zb���K���k�[��8]��\b?!�|mx��q�F��>ȉ�2D�� �2�����~+���Ɔ��< � NA�?L _$)��2 ��+%�vj"��5�$%�RS�;��3��O��/~��]R���ė��Ki�+�]��))���,%�������$���_�(	���O��>�G����Xj�z{��E"�L�>�7#ٝ��N$������ZBz�oS�����q�A��?��$Z+ �
@�BT�x���Ǔo��C�c"�L�>������wb3w��w�/�]�~��g����o���z~����;��##������)���z����>�o���0=�{�� ���A?ID
�_�
��h��Y�׎| >��8�$�M�ȗ&����{�?��D׋?��_��~�]ƭj�X�|�r���=��A�q'�o��u�m�&U�'��'	q����'���q������هq�]�_!����A�����8펝'��v�7!N�c�	q�{K�3��QB�i�>��;v�gٱg�8�o;E����B�}Ǯ��v�>�ıcqΝ�M�s��[B�w~B��u0�����g�����k?���~8����%�w?� rՉ����s����������3�|����G�S�s����8	�d��}�\�yU���V.\|�����@����4��� � &|�����{�����#���V|
�.�V|+vb�y�k�[�}� ����� N���$�������%b���<����ۓ�=��o쁳m6����	���.��r �~�t��%
8��}�o;:����ǰ�� ܈tw}��[��G�=��'r���;`"��Q�dKR&��޾��l .���
�g�{�? �#�6�l��{�]��!��#��/E���޶ ��=���|t��O�m���F)��v�3�������{��>� � �ڣ~)���	B}��vϓӺ��]{��_���7�u����n��r����Gc1X_''0�jY�Z@!'-��͒6A�P������s��ާ@a�� ����;�D���A[�.���h�����# /G�D�K�B�Xg��%�[
|G
���1(���¸5,	r�D��\�Nn['��TS5��=�c	��Є�l1�zk��Ѱ (�AlwT��D��@��������H��Bq����@� �)���~P���Dk��0$�8)�ozE yG���\G���;����<K�$�G��N�#�*���.�P_B{���@z&b^��<������ܶ�5m�d��'���y"ܑ�Y��!;��{�Ay�9l����'��ܐ����+�Q#py���t�`����py ?QCw�M��s.X��n6������\�NeE� ��v�ҭ�Z��vj+\G�?���P  