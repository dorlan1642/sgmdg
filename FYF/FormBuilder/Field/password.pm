
package FYF::FormBuilder::Field::password;

=head1 NAME

FYF::FormBuilder::Field::password - FormBuilder class for password fields

=head1 SYNOPSIS

    use FYF::FormBuilder::Field;

    # delegated straight from FormBuilder
    my $f = FYF::FormBuilder::Field->new($form,
                                         name => 'whatever',
                                         type => 'password');

=cut

use strict;

our $VERSION = '3.0302';

# hidden and password fields are rendered exactly like text fields

use FYF::FormBuilder::Util;
use FYF::FormBuilder::Field::text;
use base 'FYF::FormBuilder::Field::text';

1;

__END__

=head1 DESCRIPTION

This module is used to create B<FormBuilder> elements of a specific type.
Currently, each type module inherits all of its methods from the main
L<FYF::FormBuilder::Field> module except for C<tag()> and C<script()>,
which affect the XHMTL representation of the field.

Please refer to L<FYF::FormBuilder::Field> and L<FYF::FormBuilder> for
documentation.

=head1 SEE ALSO

L<FYF::FormBuilder>, L<FYF::FormBuilder::Field>

=head1 REVISION

$Id: password.pm,v 1.11 2006/02/24 01:42:29 nwiger Exp $

=head1 AUTHOR

Copyright (c) 2005-2006 Nate Wiger <nate@wiger.org>. All Rights Reserved.

This module is free software; you may copy this under the terms of
the GNU General Public License, or the Artistic License, copies of
which should have accompanied your Perl kit.

=cut
